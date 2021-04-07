<?php

namespace App\Controller;

use App\Entity\Track;
use App\Form\TrackType;
use App\Repository\TrackRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/track")
 */
class TrackController extends AbstractController
{
    /**
     * @Route("/", name="track_index", methods={"GET"})
     */
    public function index(TrackRepository $trackRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        return $this->render('track/index.html.twig', [
            'tracks' => $trackRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="track_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        $track = new Track();
        $form = $this->createForm(TrackType::class, $track);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($track);
            $entityManager->flush();

            return $this->redirectToRoute('track_index');
        }

        return $this->render('track/new.html.twig', [
            'track' => $track,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="track_show", methods={"GET"})
     */
    public function show(Track $track): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        return $this->render('track/show.html.twig', [
            'track' => $track,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="track_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Track $track): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        $form = $this->createForm(TrackType::class, $track);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('track_index');
        }

        return $this->render('track/edit.html.twig', [
            'track' => $track,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="track_delete", methods={"POST"})
     */
    public function delete(Request $request, Track $track): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        if ($this->isCsrfTokenValid('delete'.$track->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($track);
            $entityManager->flush();
        }

        return $this->redirectToRoute('track_index');
    }
}
