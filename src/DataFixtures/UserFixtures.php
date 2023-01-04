<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('thomas.aldaitz@wildcodeschool.com');
        $hash = $this->passwordHasher->hashPassword($user, 'toto123');
        $user->setPassword($hash);
        $user->setFirstname('Thomas');
        $user->setLastname('Aldaitz');
        $user->setRoles(['ROLE_ADMIN', "ROLE_FORMATEUR"]);
        $manager->persist($user);

        $robert = new User();
        $robert->setEmail('robert.test@wildcodeschool.com');
        $hashRobert = $this->passwordHasher->hashPassword($user, 'roro123');
        $robert->setPassword($hashRobert);
        $robert->setFirstname('Robert');
        $robert->setLastname('Test');
        $manager->persist($robert);

        $manager->flush();
    }
}
