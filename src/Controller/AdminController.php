<?php

namespace App\Controller;

use App\Entity\Race;
use App\Entity\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="app_admin")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Race::class);

        $races = $repo->findAll();
        $admin = new Admin();
        $roles = $admin->getRoles();
        dd($roles);
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'races' => $races,
        ]);
    }
}
