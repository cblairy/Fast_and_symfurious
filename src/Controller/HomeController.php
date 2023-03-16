<?php

namespace App\Controller;

use App\Entity\Pilot;

use Symfony\Component\Security\Core\Security;
use App\Repository\RaceRepository;
use App\Repository\ChampionshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @var Security
     */
    private $security;

    public function __construct(Security $security)
    {
       $this->security = $security;
    }

    /**
     * @Route("/home", name="app_home_index")
     */
    public function index(RaceRepository $raceRepository, ChampionshipRepository $championshipRepository): Response
    {
        $pilot = new Pilot();
        $racesDone = $raceRepository->findByRacesDone();
        $nextRaces = $raceRepository->findByNextRaces();
        //$ranking = $championshipRepository->findByPilotId($this->security->getUser()->getId());
        $i = 1;


        return $this->render('home/index.html.twig', [
            'racesDone' => $racesDone,
            'nextRaces' => $nextRaces,
            //'ranking' => $ranking,
            'i' => $i++
        ]);
    }

    
}
