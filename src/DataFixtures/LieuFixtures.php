<?php

namespace App\DataFixtures;

use App\Entity\Lieu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LieuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
//        $lieu = new Lieu();
//        $lieu   ->setNom("Piscine")
//                ->setRue("Rue des piscinades")
//                ->setLatitude(127.56)
//                ->setLongitude(308.76);
//
//        $manager->persist($lieu);
//
//        $manager->flush();
    }
}
