<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AVilleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $ville = new Ville();
        $ville  ->setNom("Rennes")
                ->setCodePostal(35000);


        $manager->persist($ville);

        $ville = new Ville();
        $ville  ->setNom("Nantes")
            ->setCodePostal(44000);



        $manager->persist($ville);

        $manager->flush();
    }
}
