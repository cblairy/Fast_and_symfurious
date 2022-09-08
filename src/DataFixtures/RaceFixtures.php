<?php

namespace App\DataFixtures;

use App\Entity\Race;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RaceFixtures extends Fixture
{
    const NBR = 10;
    const REF_RACE = "ref_race :";

    public function load(ObjectManager $manager): void
    {
        for( $i = 1 ; $i <= self::NBR ; $i++ )
        {
            
            $race = new Race();
            $race->setDate(new \DateTime())
                ->setStartGrid(["Position n°{$i}" => "{$i}"])
                ->setEndGrid(["Position n°{$i}" => "{$i}"])
                ->setName("CourseName n°{$i}")
                ->setLength("{$i}"*2000)
                ->setDifficulty("{$i}")
                ->setCity("City n°{$i}");

            $manager->persist($race);

            $this->addReference(self::REF_RACE . $i, $race);

        }

        $manager->flush();
    }
}
