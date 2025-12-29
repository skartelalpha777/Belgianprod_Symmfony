<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{
    // 1. On déclare une propriété pour stocker le hasher
    private UserPasswordHasherInterface $hasher;


    // 2. On utilise le constructeur pour récupérer l'outil de hachage
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void

    {


        $data = [
            ["email" => "job6241@gmail.com", "role" => "admin", "mdp" => "epfc"],
            /* ["email" => "beta", "role" => "user", "mdp" => "epfc"],
            ["email" => "omega", "role" => "user", "mdp" => "epfc"],*/


        ];
        foreach ($data as $pers) {
            $user = new User();
            $user->setEmail($pers['email']);
            $user->setRoles([$pers['role']]);

            $password = $this->hasher->hashPassword($user, $pers['mdp']);
            $user->setPassword($password);


            $manager->persist($user);
        }


        $manager->flush();
    }
}
