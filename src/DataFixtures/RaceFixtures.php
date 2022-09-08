<?php

namespace App\DataFixtures;

use App\Entity\Race;
use App\Entity\Tournament;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RaceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for( $i = 1 ; $i <= 20 ; $i++ )
        {
            
            $race = new Race();
            $race->setDate(new \DateTime())
                ->setStartGrid(["Position n°{$i}" => "{$i}"])
                ->setEndGrid(["Position n°{$i}" => "{$i}"]);

            $manager->persist($race);

        }

        $manager->flush();
    }
}
