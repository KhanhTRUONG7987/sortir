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
        $campus->setNom("CHARTRES DE BRETAGNE");
        $manager->persist($campus);

        $campus = new Campus();
        $campus->setNom("NIORT");
        $manager->persist($campus);

        $campus = new Campus();
        $campus->setNom("LA ROCHE SUR YON");
        $manager->persist($campus);

        $campus = new Campus();
        $campus->setNom("NANTES");
        $manager->persist($campus);

        $manager->flush();
    }
}
