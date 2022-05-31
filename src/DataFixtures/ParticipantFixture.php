<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ParticipantFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $participant = new Participant();
        $participant->setNom('DEBOUDT');
        $participant->setPrenom('Quentin');
        $participant->setTelephone('0687789856');
        $participant->setMail('ququ@gmail.com');
        $participant->setMotPasse('password');
        $participant->setActif(true);

        $manager->persist($participant);

        $manager->flush();
    }
}
