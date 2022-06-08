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

        $ville = $manager->getRepository(Ville::class)->findAll();

        var_dump("villes: ", $ville);

        $lieu = new Lieu();


        $lieu   ->setNom("Piscine")
                ->setRue("Rue des piscinades")
                ->setLatitude(127.56)
                ->setLongitude(308.76)
                ->setVilleLieux($ville[0]);


        $manager->persist($lieu);

        $manager->flush();
    }
}
