<?php

namespace App\DataFixtures;

use App\Entity\Pilot;
use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PilotFixtures extends Fixture
{
    const NBR = 20;
    const REF_PILOT = "mon-pilote";

    public function load(ObjectManager $manager): void
    {
        for( $i = 1 ; $i <= self::NBR ; $i++ )
        {
            $car = new Car();
                $car->setBrand("voiture n°{$i}")
                    ->setModel("Mustang n°{$i}")
                    ->setCylinder("{$i}")
                    ->setMaxSpeed("{$i}"*50)
                    ->setEstimatedValue("{$i}"*5000)
                    ->setIsBroken(false);

            $manager->persist($car);

            $pilot = new Pilot();
            $pilot->setUsername("pilot n°$i")
                ->setRoles(["0" => "ROLE_USER"])
                ->setPassword("$i$i$i$i")
                ->setNationality("nationality n°$i")
                ->setDrivingSkills($i*2)
                ->setPhotogenicSkills($i*3)
                ->setAvatar("http://placehold.it/100x150")
                ->setWallet("$i"*2000)
                ->setCar($car);

            $manager->persist($pilot);

            $this->addReference(self::REF_PILOT . $i, $pilot);

        }

        $manager->flush();


    }
}
