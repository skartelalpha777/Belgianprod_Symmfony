<?php

namespace App\DataFixtures;

use App\Entity\Film;
use App\Entity\Acteur;     // Import correct
use App\Entity\Categorie;  // Import correct (et pas Proxies\...)
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
// Pas besoin de EntityManagerInterface ici, ObjectManager suffit

class FilmFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    { /*
        // 1. Charger les films simples (votre boucle)
        $data = [
            ["Interstellar", "Un groupe d'explorateurs voyage à travers un trou de ver..."],
            ["Inception", "Un voleur spécialisé dans le vol d'informations..."],
            ["Blade Runner", "Dans un Los Angeles futuriste..."]
        ];

        foreach ($data as $filmData) {
            $f = new Film();
            $f->setTitre($filmData[0]);
            $f->setDescription($filmData[1]);
            $manager->persist($f);
        }
*/
        // 2. Appeler votre fonction pour ajouter Forrest Gump
        $this->addForrestGump($manager);

        // 3. Tout envoyer en base de données d'un coup
        $manager->flush();
    }

 
    private function addForrestGump(ObjectManager $manager): void
    {
    
        $cat = $manager->getRepository(Categorie::class)->find(3);
        
        // Récupération des acteurs
        $acteur1 = $manager->getRepository(Acteur::class)->find(3);
        $acteur2 = $manager->getRepository(Acteur::class)->find(4);

        // Vérification de sécurité (optionnelle mais conseillée)
        if ($cat && $acteur1 && $acteur2) {
            $Forrest = new Film();
            $Forrest->setTitre("Forrest Gump");
            $Forrest->setDescription("L'histoire d'un homme simple d'esprit...");
            
            $Forrest->setCategorie($cat);
            
            // C'est ici que la table intermediaire "films_acteur" cvia  la relation manyTomany
            $Forrest->addActeur($acteur1);
            $Forrest->addActeur($acteur2);

            $manager->persist($Forrest);
        }
    }
}