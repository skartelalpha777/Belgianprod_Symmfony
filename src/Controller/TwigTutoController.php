<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TwigTutoController extends AbstractController
{
    #[Route('/tuto-twig', name: 'app_tuto_twig')]
    public function index(): Response
    {
        // Voici vos données d'exercice (Simulation d'un panier d'achat)
        $user = [
            'prenom' => 'Thomas',
            'premium' => false, // Il est client VIP
            'points_fidelite' => 450
        ];

        $produits = [
            ['nom' => 'PS5', 'prix' => 499, 'stock' => 5],
            ['nom' => 'Manette', 'prix' => 70, 'stock' => 0], // Rupture de stock
            ['nom' => 'Jeu FIFA', 'prix' => 60, 'stock' => 12],
            ['nom' => 'Carte Cadeau', 'prix' => 20, 'stock' => 100]
        ];

        return $this->render('tuto/index.html.twig', [
            'client' => $user,
            'panier' => $produits,
            'date_commande' => new \DateTime('now')
        ]);
    }

    #[Route('/tuto-twig-2', name: 'app_tuto_twig_2')]
    public function niveau2(): Response
    {
        // Simulation d'une liste de commandes pour l'exercice
        $commandes = [
            [
                'id' => 'CMD-001',
                'client' => 'Jean Dupont',
                'statut' => 'livré',
                'produits' => [
                    ['nom' => 'Vélo', 'prix' => 200, 'qte' => 1],
                    ['nom' => 'Casque', 'prix' => 50, 'qte' => 2],
                ]
            ],
            [
                'id' => 'CMD-002',
                'client' => 'Marie Curie',
                'statut' => 'en_attente',
                'produits' => [
                    ['nom' => 'Ordinateur', 'prix' => 1000, 'qte' => 1],
                ]
            ],
            [
                'id' => 'CMD-003',
                'client' => 'Albert Einstein',
                'statut' => 'annulé',
                'produits' => [] // Commande vide
            ]
        ];

        // On envoie ces données vers une NOUVELLE vue
        return $this->render('tuto/index2.html.twig', [
            'commandes' => $commandes
        ]);
    }
}
