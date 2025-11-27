<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Entity\Acteur;
use App\Entity\Categorie;
use App\Entity\Film;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraints\Time;


final class DataController extends AbstractController
{
    #[Route('/data', name: 'app_data')]
    public function index(): Response
    {
        return $this->render('data/index.html.twig', [
            'controller_name' => 'DataController',
        ]);
    }

    #[Route('/add-acteur', name: 'add_acteur')]

    function addActeur(EntityManagerInterface $em)
    {

        $act = new Acteur();
        $act->setNom("bah");
        $act->setPrenom("ousmane");
        $act->setDateNaissance(new DateTime("2003-05-30"));
        $act->setSexe("M");

        $act1 = new Acteur();
        $act1->setNom("sow");
        $act1->setPrenom("fatima");
        $act1->setDateNaissance(new DateTime("2006-02-05"));
        $act1->setSexe("F");


        $em->persist($act);

        $em->persist($act1);
        $em->flush();

        return new Response("Actteurs ajoutés" . $act->getId() . " , " . $act1->getId());
    } 
    #[Route('/add-film', name: 'add-film')]
    function addfilm(EntityManagerInterface $em)
    {

        $film = new Film();
        $film->setTitre("nterstellar ");
        $film->setDescription("Un groupe d'explorateurs voyage à travers un trou de ver pour trouver une nouvelle planète habitable");
        $em->persist($film);

        $film2 = new Film();
        $film2->setTitre("Inception");
        $film2->setDescription("Un voleur spécialisé dans le vol d'informations en s'infiltrant dans 
        les rêves des gens se voit confier une tâche apparemment impossible : implanter une idée dans un esprit");
        $em->persist($film2);

        $film3 = new Film();
        $film3->setTitre("Blade Runner");
        $film3->setDescription("Dans un Los Angeles futuriste, un policier spécialisé traque des androïdes évadés");
        $em->persist($film3);

        $em->flush();

        return new Response("les films suivant o,nt été ajoutées <p>" . $film->getTitre() . "</p> <p>" . $film2->getTitre() . "</p> <p>" . $film3->getTitre() . "</p>");
    }
    

    #[Route('/add-categorie', name: 'add-categorie')]
    function addCategorie(EntityManagerInterface $em)
    {

        $cat = new Categorie();
        $cat->setNo("comedie");
        $em->persist($cat);

        $cat1 = new Categorie();
        $cat1->setNo("action");
        $em->persist($cat1);

        $cat2 = new Categorie();
        $cat2->setNo("drame");
        $em->persist($cat2);

        $em->flush();
        return new Response("les categories suivantes <p>" . $cat->getNo() . "</p> <p>" . $cat1->getNo() . "</p> <p>" . $cat2->getNo() . "</p>");
    }
}
