<?php

namespace App\DataFixtures;

use App\Entity\Campus;
use App\Entity\User ;
use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ParticipantFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $this->addCity($manager);

        // $product = new Product();
        // $manager->persist($product);
//        $newCampus = new Campus();
//        $newCampus->setNom('Chartre');
//        $manager->getRepository(Campus::class)->add($newCampus);
//        $campus= $manager->getRepository(Campus::class)->findAll();
//        $manager->persist($newCampus);
//        $manager->flush();
//        var_dump($campus);
//
//        $User = new User();
//        $User->setEmail('QuQu@gmail.com');
//        $User->setPassword('Pa$$w0rd');
//        $User->setNom('DEBOUDT');
//        $User->setPrenom('Quentin');
//        $User->setTelephone('0687789856');
//        $User->setActif(true);
//        $User->setEstRattache($campus[0]) ;
//
//
//        $manager->persist($User);
//
//        $manager->flush();
    }

    public function addCity(ObjectManager $manager){

        $ville = new Ville();
        $ville->setNom("Test")->setCodePostal(35000);

        $manager->persist($ville);
        $manager->flush();


        $campus = new Campus();
        $campus->setNom("Test");

        $manager->persist($campus);
        $manager->flush();


        $campus = $manager->getRepository(Campus::class)->findAll();
        $user = new User();
        $user->setEmail('QuQu@gmail.com');
        $user->setPassword('Pa$$w0rd');
        $user->setNom('DEBOUDT');
        $user->setPrenom('Quentin');
        $user->setTelephone('0687789856');
        $user->setActif(true);
        $user->setEstRattache($campus[0]) ;

        $manager->persist($user);
        $manager->flush();
    }
}
