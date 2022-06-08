<?php

namespace App\DataFixtures;

use App\Entity\Campus;
use App\Entity\Lieu;
use App\Entity\Sortie;
use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SortieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       /* $ville = $manager->getRepository(Ville::class)->findAll();
        $lieu = $manager->getRepository(Lieu::class)->findAll();
        $campus = $manager->getRepository(Campus::class)->findAll();
        $sortie = new Sortie();
        $sortie ->setNom()
                ->setDateHeureDebut()
                ->setDateLimiteInscription()
                ->setNbinscriptionsMax()
                ->setDuree()
                ->setInfosSortie()
                ->getSortieOrganisee($campus[0])
                ->getSiteOrganisateur()
                ->setDateHeureDebut()
                ->setDateHeureDebut()
                ->setDateHeureDebut()
                ->setDateHeureDebut()
                ->setDateHeureDebut();

        $manager->persist($sortie);

        $manager->flush();*/
    }
}
