<?php

namespace App\Controller;

use App\Entity\Race;
use App\Repository\RaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="app_home")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Race::class);


        $races = $repo->findBy(
            ['date' => new \DateTime > new \Datetime("2010-05-15 16:00:00")]
        );
        dd($races);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'races' => $races,
        ]);
    }

    
}
