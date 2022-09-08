<?php

namespace App\DataFixtures;

use App\Entity\Circuit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CircuitFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for( $i = 1 ; $i <= 10 ; $i++ )
        {
            
            $circuit = new Circuit();
            $circuit->setName("circuit n°{$i}")
                ->setLength("{$i}"*1000)
                ->setDifficulty("{$i}")
                ->setCity("city n°{$i}");

            $manager->persist($circuit);

        }
        $manager->flush();
    }
}
