<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 */
class AdministratorAreaController extends AbstractController
{
    /**
     * @Route("/{_locale}/back/administrator", name="back_administrator",requirements={"_locale": "es|en"}, defaults={"_locale": "es"}, methods={"GET"})
     */
    public function index()
    {

        return $this->render('back/administrator/index.html.twig', []);
    }
}
