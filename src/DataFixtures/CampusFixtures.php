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


        $manager->persist($campus);

        $manager->flush();
    }
}
