<?php

namespace App\Controller;

use App\Entity\Subcategories;
use App\Form\SubcategoriesType;
use App\Repository\SubcategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/subcategories")
 */
class SubcategoriesController extends AbstractController
{
    /**
     * @Route("/", name="subcategories_index", methods={"GET"})
     */
    public function index(SubcategoriesRepository $subcategoriesRepository): Response
    {
        return $this->render('subcategories/index.html.twig', [
            'subcategories' => $subcategoriesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="subcategories_show", methods={"GET"})
     */
    public function show(Subcategories $subcategory): Response
    {
        return $this->render('subcategories/show.html.twig', [
            'subcategory' => $subcategory,
        ]);
    }

}
