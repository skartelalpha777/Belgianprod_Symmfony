<?php

namespace App\DataFixtures;

use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FilmFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);


        $data = [
            ["nterstellar ", "Un groupe d'explorateurs voyage à travers un trou de ver pour trouver une nouvelle planète habitable"],
            ["Inception", "Un voleur spécialisé dans le vol d'informations en s'infiltrant dans 
        les rêves des gens se voit confier une tâche apparemment impossible : implanter une idée dans un esprit"],
            ["Blade Runner", "Dans un Los Angeles futuriste, un policier spécialisé traque des androïdes évadés"]
        ];

        foreach ($data as $film) {
            $f = new Film();
            $f->setTitre($film[0]);
            $f->setDescription($film[1]);
            $manager->persist($f);
        }

        $manager->flush();
    }
}
