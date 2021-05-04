<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/{_locale}", name="landing", requirements={"_locale": "es|en"}, defaults={"_locale": "es"}, methods={"GET"})
     */
    public function index()
    {
        return $this->render('front/index.html.twig', [

        ]);
    }
}
