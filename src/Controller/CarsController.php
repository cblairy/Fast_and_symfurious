<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarsController extends AbstractController
{
    /**
     * @Route("/cars", name="app_cars")
     */
    public function index(): Response
    {
        return $this->render('cars/index.html.twig', [
            'controller_name' => 'CarsController',
        ]);
    }
}
