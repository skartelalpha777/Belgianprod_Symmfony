<?php

namespace App\DataFixtures;

use App\Entity\Acteur;
use App\Entity\Film;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActeurFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    { /*

        $data = [
            ["Nom" => "Pogba", "Prenom" => "Paul", "date_naissance" => new DateTime("1989-05-25"), "sexe" => "M", "pays" => "France"],
            ["Nom" => "Mbappe", "Prenom" => "Paul", "date_naissance" => new DateTime("1999-08-05"), "sexe" => "M", "pays" => "France"],
            ["Nom" => "Bah", "Prenom" => "Assiatou", "date_naissance" => new DateTime("2005-12-02"), "sexe" => "F", "pays" => "Belgique"],
            ["Nom" => "lukaku", "Prenom" => "romelo", "date_naissance" => new DateTime("1993-05-25"), "sexe" => "M", "pays" => "Belgique"]


        ];

        foreach ($data as $personne) {
            $actor = new Acteur();
            $actor->setNom($personne['Nom']);
            $actor->setPrenom($personne['Prenom']);
            $actor->setDateNaissance($personne['date_naissance']);
            $actor->setSexe($personne['sexe']);
            $actor->setPays($personne['pays']);

            $manager->persist($actor);
        }



        $manager->flush(); */

        
    }
}
