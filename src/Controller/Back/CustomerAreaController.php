<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Security("is_granted('ROLE_CUSTOMER')")
 */
class CustomerAreaController extends AbstractController
{
    /**
     * @Route("/back/customer", name="back_customer",methods={"GET"})
     */
    public function index()
    {
        return $this->render('back/customer/index.html.twig', []);
    }
}
