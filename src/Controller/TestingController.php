<?php

namespace App\Controller;

use App\Service\EmailManagerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestingController extends AbstractController
{
    /**
     * @Route("/testing", name="testing")
     */
    public function index(EmailManagerService $ems): Response
    {

        $ems->toCustomerAccessBackend();
        return $this->render('base.html.twig', []);
    }
}
