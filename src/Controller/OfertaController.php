<?php

namespace App\Controller;

use App\Entity\Oferta;
use App\Entity\Empresa;
use App\Form\OfertaType;
use App\Repository\OfertaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/oferta")
 */
class OfertaController extends AbstractController
{
    /**
     * @Route("/", name="oferta_index", methods={"GET"})
     */
    public function index(OfertaRepository $ofertaRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        return $this->render('oferta/index.html.twig', [
            'ofertas' => $ofertaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="oferta_new", methods={"GET","POST"})
     */
    public function new(Request $request, OfertaRepository $ofertaRepository): Response
    {

        $ofertum = new Oferta();
        $ofertum->getEmpresa();
        $empresa = $this->getDoctrine()->getRepository(Empresa::class)->findOneBy(['usuari' => $this->getUser()->getId()]);
        $ofertum->setEmpresa($empresa);
        $ofertum->setDataPublicacio(new \DateTime());
        $form = $this->createForm(OfertaType::class, $ofertum);
        $form->handleRequest($request);

//        $teOfertes = $ofertum->getEmpresa();
//        $teOfertes = $ofertaRepository->findBy(['empresa' =>  $ofertum->getEmpresa()]);
//        dump($teOfertes);die;

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $ofertum->setEstat(0);
            $entityManager->persist($ofertum);
            $entityManager->flush();

            $this->addFlash('success', 'Oferta Creada! Ets un geni!');

            if(in_array("ROLE_ADMIN", $this->getUser()->getRoles())){
                return $this->redirectToRoute('oferta_index');
            }
            else{
                return $this->redirectToRoute('oferta_new');
            }

        }

        return $this->render('oferta/new.html.twig', [
            'ofertum' => $ofertum,
            'form' => $form->createView(),
            'ofertes' => $ofertaRepository->findBy(['empresa' =>  $ofertum->getEmpresa()]),
        ]);
    }

    /**
     * @Route("/{id}", name="oferta_show", methods={"GET"})
     */
    public function show(Oferta $ofertum): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        return $this->render('oferta/show.html.twig', [
            'ofertum' => $ofertum,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="oferta_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Oferta $ofertum): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        $form = $this->createForm(OfertaType::class, $ofertum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('oferta_index');
        }

        return $this->render('oferta/edit.html.twig', [
            'ofertum' => $ofertum,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="oferta_delete", methods={"POST"})
     */
    public function delete(Request $request, Oferta $ofertum): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        if ($this->isCsrfTokenValid('delete'.$ofertum->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ofertum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('oferta_index');
    }
}
