<?php

namespace App\Controller;

use App\Repository\CandidatRepository;
use App\Repository\EmpresaRepository;
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
    public function redireccionar(EmpresaRepository $empresaRepository, CandidatRepository $candidatRepository): Response
    {
        if(in_array("ROLE_EMPRESA", $this->getUser()->getRoles())){
            $id = $this->getUser()->getId();
            $objectes = $empresaRepository->findOneBy( array('usuari'=>$id));
            if ($objectes) {
                return $this->redirectToRoute('oferta_new');
            }
            return $this->redirectToRoute('empresa_new');
        }
        else if(in_array("ROLE_ADMIN", $this->getUser()->getRoles())){
            return $this->redirectToRoute('oferta_index');
        }
        else{
            $id = $this->getUser()->getId();
            $objectes = $candidatRepository->findOneBy( array('usuari'=>$id));
            if ($objectes) {
                return $this->redirectToRoute('roleuser');
            }
            return $this->redirectToRoute('candidat_new');
        }
    }

}
