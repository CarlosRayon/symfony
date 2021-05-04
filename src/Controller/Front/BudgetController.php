<?php

namespace App\Controller\Front;

use DateTime;
use App\Entity\User;
use App\Entity\Product;
use App\Event\BudgetRequestEvent;
use App\EventSubscriber\MailerSubscriber;
use App\Service\EmailManagerService;
use Symfony\Component\BrowserKit\Response;
use Symfony\Contracts\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\EventDispatcher\EventDispatcher;
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
        dump($products);
        return $this->render('front/budget.html.twig', ['products' => $products]);
    }

    /**
     * @Route("/form_budget", name="form_budget", methods={"POST"})
     */
    public function proccessFormBudget(Request $request, UserPasswordEncoderInterface $passwordEncoder, MailerSubscriber $mailerSubscriber, EmailManagerService $emailManagerService)
    {

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
        // $em->flush($user);

        // $dispatcher = new EventDispatcher();
        // $dispatcher->addSubscriber($mailerSubscriber);
        // $budget = new BudgetRequestEvent($user);
        // $dispatcher->dispatch($budget,  BudgetRequestEvent::EVENT_NAME);

        $emailManagerService->toCustomerAccessBackend();



        return $this->render('front/budget-summary.html.twig', [
            'user' => $user,
            'token' => $token
        ]);
    }
}
