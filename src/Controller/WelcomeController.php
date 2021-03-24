<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/welcome", name="welcome")
     */
    public function index(): Response
    {

        if (is_object($this->get('security.token_storage')->getToken()->getUser())) {
            return $this->redirectToRoute('redireccionar');
        }

        else  {
            return $this->redirectToRoute('app_login');
        }

    }
    /**
     * @Route("/redireccionar", name="redireccionar")
     */
    public function redireccionar(): Response
    {
        if(in_array("ROLE_EMPRESA", $this->getUser()->getRoles())){
                return $this->redirectToRoute('roleempresa');
        }
        else if(in_array("ROLE_ADMIN", $this->getUser()->getRoles())){
            return $this->redirectToRoute('roleadmin');
        }
        else{
            return $this->redirectToRoute('roleuser');
        }

        return $this->render('welcome/index.html.twig', [
            'controller_name' => 'WelcomeController',
        ]);
    }
}
