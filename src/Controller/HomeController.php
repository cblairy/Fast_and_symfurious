<?php

namespace App\Controller;

use App\Repository\RaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home_index")
     */
    public function index(RaceRepository $raceRepository): Response
    {
        $raceRepository->findByDateTime();
        $races = $raceRepository->findBy(
            ['date' => new \DateTime()]
        );

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'races' => $races,
        ]);
    }

    
}
