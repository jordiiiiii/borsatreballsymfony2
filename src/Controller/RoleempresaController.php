<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoleempresaController extends AbstractController
{
    /**
     * @Route("/roleempresa", name="roleempresa")
     */
    public function index(): Response
    {
        return $this->render('roleempresa/index.html.twig', [
            'controller_name' => 'RoleempresaController',
        ]);
    }
}
