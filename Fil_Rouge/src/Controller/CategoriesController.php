<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Form\CategoriesType;
use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CategoriesController extends AbstractController
{
    /**
     * @Route("/", name="categories_index", methods={"GET"})
     */
    public function index(CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('base.html.twig', [
            'categories' => $categoriesRepository->findAll(),
        ]);
    }

}
