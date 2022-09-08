<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdminFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $admin = new Admin();
        $admin->setUsername("admin n°1")
                ->setRoles(['role' => 'admin'])
                ->setPassword("0000");

        $manager->persist($admin);

        $manager->flush();
    }
}
