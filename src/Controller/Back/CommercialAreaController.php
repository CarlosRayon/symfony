<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Security("is_granted('ROLE_COMMERCIAL')")
 */
class CommercialAreaController extends AbstractController
{
    /**
     * @Route("/back/commercial", name="back_commercial",methods={"GET"})
     */
    public function index()
    {
        return $this->render('back/commercial/index.html.twig', [
        ]);
    }
}
