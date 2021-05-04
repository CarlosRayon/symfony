<?php

namespace App\Controller\Front;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
}
