<?php

namespace App\DataFixtures;

use App\Entity\Sortie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Utilisation de Faker//
        $faker = Factory::create('fr_FR');

        //Création d'une sortie
        for ($i = 0; $i < 20; $i++) {
            $sortie = new Sortie();

            $sortie->setNom($faker->firstName())
                ->setDateHeureDebut($faker->dateTime($max = 'now', $timezone = null))
                ->setDuree($faker->randomDigitNotNull())
                ->setDateLimiteInscription($faker->dateTime())
                ->setNbinscriptionsMax($faker->randomDigitNotNull())
                ->setInfosSortie($faker->text())
                ->setEtat('etat');

            $manager->persist($sortie);
            $manager->flush();
        }

    }
}
