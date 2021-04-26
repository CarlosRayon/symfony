<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/back/index", name="back_index",methods={"GET"})
     */
    public function index()
    {
        return $this->render('back/index.html.twig', [
        ]);
    }
}
