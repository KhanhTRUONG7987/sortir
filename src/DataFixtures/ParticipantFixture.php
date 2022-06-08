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

        //#################### user 1 #############################
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
        //$user1->Pseudo('QuQu');
        $user->setNom('DEBOUDT');
        $user->setPrenom('Quentin');
        $user->setTelephone('0687789856');
        $user->setActif(true);
        $user->setEstRattache($campus[0]);
        $user->setRoles((array)'ROLE_ADMIN');

        $manager->persist($user);

        //#################### user 2 #############################
        $user1 = new User();
        $user1->setEmail('LeLe@gmail.com');

        $plaintextPassword = 456;
        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user1,
            $plaintextPassword
        );
        $user1->setPassword($hashedPassword);
        //$user1->Pseudo('LéLé');
        $user1->setNom('Turgeon');
        $user1->setPrenom('Léa');
        $user1->setTelephone('0615345856');
        $user1->setActif(true);
        $user1->setEstRattache($campus[1]);
        $user1->setRoles((array)'ROLE_USER');

        $manager->persist($user1);

        $manager->flush();

    }
}
