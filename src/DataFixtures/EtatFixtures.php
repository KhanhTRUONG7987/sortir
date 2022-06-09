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
        $etat->setLibelle("En creation");
        $manager->persist($etat);


        $etat1 = new Etat();
        $etat1->setLibelle("Ouverte");
        $manager->persist($etat1);

        $etat2 = new Etat();
        $etat2->setLibelle("cloturee");
        $manager->persist($etat2);

        $manager->flush();
    }
}
