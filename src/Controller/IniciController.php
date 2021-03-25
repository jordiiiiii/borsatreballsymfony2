<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IniciController extends AbstractController
{
    /**
     * @Route("/", name="inici")
     */
    public function index(): Response
    {

        if (is_object($this->get('security.token_storage')->getToken()->getUser())) {
            return $this->redirectToRoute('welcome');
        }

        return $this->render('inici/index.html.twig', [
            'controller_name' => 'IniciController',
        ]);
    }
}
