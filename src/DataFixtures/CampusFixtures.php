<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Campus;

class CampusFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $campus = new Campus();
        $campus->setNom("RENNES");
//["SAINT-HERBLAIN","CHARTRES DE BRETAGNE", "LA ROCHE SUR YON", "NIORT", "QUIMPER"]

        $manager->persist($campus);

        $manager->flush();
    }
}
