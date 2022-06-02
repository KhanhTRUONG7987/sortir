<?php

namespace App\DataFixtures;

use App\Entity\Campus;
use App\Entity\User ;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ParticipantFixture extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager ){
        $this->addUser($manager);

    }
    public function addUser($manager){

        $campus = $manager->getRepository(Campus::class)->findAll();
        $user = new User();
        $user->setEmail('QuQu@gmail.com');

        $plaintextPassword = 123;
        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);

        $user->setNom('DEBOUDT');
        $user->setPrenom('Quentin');
        $user->setTelephone('0687789856');
        $user->setActif(true);
        $user->setEstRattache($campus[0]);

        $manager->persist($user);
        $manager->flush();
    }
}
