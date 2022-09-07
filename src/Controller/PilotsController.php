<?php

namespace App\Controller;

use App\Entity\Pilots;
use App\Form\PilotsType;
use App\Repository\PilotsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pilots")
 */
class PilotsController extends AbstractController
{
    /**
     * @Route("/", name="app_pilots_index", methods={"GET"})
     */
    public function index(PilotsRepository $pilotsRepository): Response
    {
        return $this->render('pilots/index.html.twig', [
            'pilots' => $pilotsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_pilots_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PilotsRepository $pilotsRepository): Response
    {
        $pilot = new Pilots();
        $form = $this->createForm(PilotsType::class, $pilot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pilotsRepository->add($pilot, true);

            return $this->redirectToRoute('app_pilots_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pilots/new.html.twig', [
            'pilot' => $pilot,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_pilots_show", methods={"GET"})
     */
    public function show(Pilots $pilot): Response
    {
        return $this->render('pilots/show.html.twig', [
            'pilot' => $pilot,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_pilots_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Pilots $pilot, PilotsRepository $pilotsRepository): Response
    {
        $form = $this->createForm(PilotsType::class, $pilot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pilotsRepository->add($pilot, true);

            return $this->redirectToRoute('app_pilots_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pilots/edit.html.twig', [
            'pilot' => $pilot,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_pilots_delete", methods={"POST"})
     */
    public function delete(Request $request, Pilots $pilot, PilotsRepository $pilotsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pilot->getId(), $request->request->get('_token'))) {
            $pilotsRepository->remove($pilot, true);
        }

        return $this->redirectToRoute('app_pilots_index', [], Response::HTTP_SEE_OTHER);
    }
}
