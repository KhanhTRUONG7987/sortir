<?php

namespace App\DataFixtures;

use App\Entity\Lieu;
use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LieuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ///################### villes 1 ###########################
        $ville = $manager->getRepository(Ville::class)->findAll();
        //var_dump("villes: ", $ville);
        $lieu = new Lieu();


        $lieu   ->setNom("Piscine")
                ->setRue("Rue des piscinades")
                ->setLatitude(127.56)
                ->setLongitude(308.76)
                ->setVilleLieux($ville[0]);
        $manager->persist($lieu);

        ///################### villes 1 ###########################
        $ville1 = $manager->getRepository(Ville::class)->findAll();
        //var_dump("villes: ", $ville);
        $lieu1 = new Lieu();


        $lieu1  ->setNom("Cinéma")
                ->setRue("Rue des cinéphiles")
                ->setLatitude(123.456)
                ->setLongitude(789.1011)
                ->setVilleLieux($ville[1]);
        $manager->persist($lieu1);


        $manager->flush();
    }
}
