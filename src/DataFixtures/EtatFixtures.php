<?php

namespace App\DataFixtures;

use App\Entity\Etat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $etat = new Etat();
        $etat->setLibelle("Créée");

        $manager->persist($etat);

        $manager->flush();
    }
}
