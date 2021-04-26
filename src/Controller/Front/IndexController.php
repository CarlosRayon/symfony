<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="public_landing",methods={"GET"})
     */
    public function index()
    {
        return $this->render('front/index.html.twig', [

        ]);
    }
}
