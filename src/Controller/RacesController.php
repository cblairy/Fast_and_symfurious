<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RacesController extends AbstractController
{
    /**
     * @Route("/races", name="app_races")
     */
    public function index(): Response
    {
        return $this->render('races/index.html.twig', [
            'controller_name' => 'RacesController',
        ]);
    }
}
