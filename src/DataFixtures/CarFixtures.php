<?php

namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for( $i = 1 ; $i <= 20 ; $i++ )
        {
            
            $car = new Car();
            $car->setBrand("voiture n°{$i}")
                ->setModel("Mustang n°{$i}")
                ->setCylinder("{$i}")
                ->setMaxSpeed("{$i}"*50)
                ->setEstimatedValue("{$i}"*5000);

            $manager->persist($car);

        }

        $manager->flush();
    }
}