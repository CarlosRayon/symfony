<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Security("is_granted('ROLE_PROJECT_MANAGER')")
 */
class ProjectManagerAreaController extends AbstractController
{
    /**
     * @Route("/back/project_manager", name="back_project_manager",methods={"GET"})
     */
    public function index()
    {
        return $this->render('back/projectmanager/index.html.twig', [
        ]);
    }
}
