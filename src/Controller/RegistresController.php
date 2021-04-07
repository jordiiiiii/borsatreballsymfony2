<?php

namespace App\Controller;

use App\Entity\Registres;
use App\Form\RegistresType;
use App\Repository\RegistresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/registres")
 */
class RegistresController extends AbstractController
{
    /**
     * @Route("/", name="registres_index", methods={"GET"})
     */
    public function index(RegistresRepository $registresRepository): Response
    {
        return $this->render('registres/index.html.twig', [
            'registres' => $registresRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="registres_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $registre = new Registres();
        $form = $this->createForm(RegistresType::class, $registre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($registre);
            $entityManager->flush();

            return $this->redirectToRoute('registres_index');
        }

        return $this->render('registres/new.html.twig', [
            'registre' => $registre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="registres_show", methods={"GET"})
     */
    public function show(Registres $registre): Response
    {
        return $this->render('registres/show.html.twig', [
            'registre' => $registre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="registres_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Registres $registre): Response
    {
        $form = $this->createForm(RegistresType::class, $registre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('registres_index');
        }

        return $this->render('registres/edit.html.twig', [
            'registre' => $registre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="registres_delete", methods={"POST"})
     */
    public function delete(Request $request, Registres $registre): Response
    {
        if ($this->isCsrfTokenValid('delete'.$registre->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($registre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('registres_index');
    }
}
