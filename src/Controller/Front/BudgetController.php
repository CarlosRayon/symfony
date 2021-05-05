<?php

namespace App\Controller\Front;

use DateTime;
use App\Entity\User;
use App\Entity\Budget;
use App\Entity\Product;
use App\Event\BudgetRequestEvent;
use App\Service\EmailManagerService;
use App\Service\BudgetManagerService;
use App\Entity\ProductCharacteristics;
use App\EventSubscriber\MailerSubscriber;
use Symfony\Component\BrowserKit\Response;
use Symfony\Contracts\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class BudgetController extends AbstractController
{

    /**
     * @Route("/{_locale}/budget", name="budget", requirements={"_locale": "es|en"}, defaults={"_locale": "es"}, methods={"GET"})
     */
    public function index()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        return $this->render('front/budget.html.twig', ['products' => $products]);
    }

    /**
     * @Route("/{_locale}/budget_summary", name="budget_summary", requirements={"_locale": "es|en"}, defaults={"_locale": "es"}, methods={"GET"})
     */
    public function bugetSummary(BudgetManagerService $budgetManagerService, SessionInterface $session)
    {

        $idBudget = $session->get('id-budget');
        $budget = $this->getDoctrine()->getRepository(Budget::class)->findOneBy(['id' => $idBudget]);
        $totalPrice = $budgetManagerService->calculateTotalPrice($budget);

        return $this->render('front/budget-summary.html.twig', [
            'budget' => $budget,
            'totalPrice' => $totalPrice
        ]);
    }

    /**
     * @Route("/form_budget", name="form_budget", methods={"POST"})
     */
    public function proccessFormBudget(
        Request $request,
        UserPasswordEncoderInterface $passwordEncoder,
        MailerSubscriber $mailerSubscriber,
        EmailManagerService $emailManagerService,
        SessionInterface $session
    ) {

        $em = $this->getDoctrine()->getManager();

        /* Get data */
        $productId = $request->request->get('product');
        $userName = $request->request->get('user-name');
        $userEmail = $request->request->get('user-email');
        $userPhone = $request->request->get('user-phone');
        $characteristics = $request->request->get('characteristics');
        $token = str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789" . uniqid());

        $user = new User();
        $user->setName($userName);
        $user->setEmail($userEmail);
        $user->setPhone($userPhone);
        $user->setRoles([User::CUSTOMER]);
        $user->setCreatedAt(new DateTime());
        $user->setUpdatedAt(new DateTime());
        $user->setPassword($passwordEncoder->encodePassword($user, $token));
        $user->setAccessToken($token);
        $em->persist($user);

        $characteristics = $em->getRepository(ProductCharacteristics::class)->findBy(['id' => $characteristics]);
        $product = $em->getRepository(Product::class)->findOneBy(['id' => $productId]);

        // $dispatcher = new EventDispatcher();
        // $dispatcher->addSubscriber($mailerSubscriber);
        // $budget = new BudgetRequestEvent($user);
        // $dispatcher->dispatch($budget,  BudgetRequestEvent::EVENT_NAME);

        $budget = new Budget();
        $budget->setUser($user);
        $budget->setProduct($product);
        foreach ($characteristics as $characteristic) {
            $budget->addProductCharacteristic($characteristic);
        }
        $em->persist($budget);
        $em->flush();

        $session->set('id-budget', $budget->getId());
        $emailManagerService->toCustomerAccessBackend($budget);

        return $this->redirectToRoute('budget_summary');
    }
}
