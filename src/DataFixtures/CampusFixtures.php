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
        $campus->setNom("Rennes");


        $manager->persist($campus);

        $campus1 = new Campus();
        $campus1->setNom("Nantes");


        $manager->persist($campus1);

        $manager->flush();
    }
}
