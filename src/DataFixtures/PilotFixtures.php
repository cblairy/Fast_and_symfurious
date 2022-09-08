<?php

namespace App\DataFixtures;

use App\Entity\Pilot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PilotFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for( $i = 1 ; $i <= 20 ; $i++ )
        {
            
            $pilot = new Pilot();
            $pilot->setUsername("pilot n°{$i}")
                ->setRoles(["role" => "user"])
                ->setPassword("{$i}{$i}{$i}{$i}")
                ->setNationality("nationality n°{$i}")
                ->setDrivingSkills("{$i}"*2)
                ->setPhotogenicSkills("{$i}"*3)
                ->setAvatar("http://placehold.it/100x150")
                ->setWallet("{$i}"*2000);

            $manager->persist($pilot);

        }

        $manager->flush();
    }
}
