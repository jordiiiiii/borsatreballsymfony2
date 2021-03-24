<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoleadminController extends AbstractController
{
    /**
     * @Route("/roleadmin", name="roleadmin")
     */
    public function index(): Response
    {
        return $this->render('roleadmin/index.html.twig', [
            'controller_name' => 'RoleadminController',
        ]);
    }
}
