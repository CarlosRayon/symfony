<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Security("is_granted('ROLE_TECHNICIAN')")
 */
class TechnicianAreaController extends AbstractController
{
    /**
     * @Route("/{_locale}/back/technician", name="back_technician", requirements={"_locale": "es|en"}, defaults={"_locale": "es"},methods={"GET"})
     */
    public function index()
    {
        return $this->render('back/technician/index.html.twig', [
        ]);
    }
}

