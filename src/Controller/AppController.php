<?php

namespace App\Controller;

use App\Repository\CategoriesProduitRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_app')]
    public function index(CategoriesProduitRepository $categoriesproduitRepository): Response
    {
        $categoriesproduit = $categoriesproduitRepository->findAll();

        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
            'categoriesproduit' => $categoriesproduit,
        ]);
    }

    #[Route('/categoriesproduit/{id}', name: 'app_categorie')]
    public function categoriesproduit($id, CategoriesProduitRepository $categoriesproduitRepository, ProduitRepository $produitRepository): Response
    {
        $categoriesproduit = $categoriesproduitRepository->findAll();
        $produit = $produitRepository->find($id);

        return $this->render('app/categorie.html.twig', [
            'controller_name' => 'AppController',
            'categoriesproduit' => $categoriesproduit,
            'produit' => $produit,
        ]);
    }
}
