<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController 
{
    /**
     * @Route("/", name="home")
     */
    public function index(CategoriesRepository $categoriesRepository): Response
    {
        // affichage de la page d'accueil
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'categories' => $categoriesRepository->findAll(),
        ]);
    }
}
