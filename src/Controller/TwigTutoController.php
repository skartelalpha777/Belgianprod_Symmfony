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
}