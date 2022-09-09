<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    
    public function load(ObjectManager $manager): void
    {
        
        $admin = new Admin();
        $admin->setUsername("admin n°1")
                ->setRoles(['role' => 'admin'])
                ->setPassword($this->userPasswordHasher->hashPassword($admin, "0000"));

        $manager->persist($admin);

        $manager->flush();
    }

}
