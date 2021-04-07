<?php

namespace App\Controller;

use App\Repository\TrackRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RegistresRepository;

class RoleadminController extends AbstractController
{
    /**
     * @Route("/roleadmin", name="roleadmin")
     */
    public function index(RegistresRepository $registresRepository, TrackRepository $trackRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        return $this->render('roleadmin/index.html.twig', [
            'registres' => $registresRepository->findAll(),
            'tracks' => $trackRepository->findAll(),
        ]);
    }
}
