<?php

namespace App\DataFixtures;

use App\Entity\Championship;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ChampionshipFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return [PilotFixtures::class, RaceFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        for( $i = 1 ; $i <= PilotFixtures::NBR ; $i++ )
        {
            for( $j = 1 ; $j <= RaceFixtures::NBR ; $j++ )
            {
                $championship = new Championship();
                $championship->setScore($i + $j)
                            ->setPilots($this->getReference(PilotFixtures::REF_PILOT . $i))
                            ->setRaces($this->getReference(RaceFixtures::REF_RACE . $j));

                $manager->persist($championship);

            }
        }  
        
        $manager->flush();
    }
}