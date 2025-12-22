<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;

class CategorieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $cat = new Categorie();
        $cat->setNo("comedie");
        $manager->persist($cat);

        $cat1 = new Categorie();
        $cat1->setNo("action");
        $manager->persist($cat1);

        $cat2 = new Categorie();
        $cat2->setNo("drame");
        $manager->persist($cat2);

        $manager->flush();
    }
}
