<?php

namespace App\Controller;

use App\Entity\Products;
use App\Form\ProductsType;
use App\Repository\ProductsRepository;
use App\Repository\CategoriesRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;



/**
 * @Route("/products")
 */
class ProductsController extends AbstractController
{
    /**
     * @Route("/", name="products_index", methods={"GET"})
     */
    public function index(ProductsRepository $productsRepository, CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('products/index.html.twig', [
            'products' => $productsRepository->findAll(),
            'categories' => $categoriesRepository->findAll(),
        ]);
    }



    /**
     * @Route("/new", name="products_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request, CategoriesRepository $categoriesRepository): Response
    {
        $product = new Products();
        // Création du formulaire
        $form = $this->createForm(ProductsType::class, $product);
        // Lecture du formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // récupération de la saisi sur l'upload
            $pictureFile = $form['pro_picture']->getData();
            $this->getDoctrine()->getManager()->flush();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($product);
            $entityManager->flush();

            $idProduct = $product->getId();

            // vérification s'il y a un upload photo
            if ($pictureFile) {
                // renommage du fichier
                // nom du fichier + extension
                $newPicture = $idProduct . '.' . $pictureFile->guessExtension();
                // assignation de la valeur à la propriété picture à l'aide du setter
                $product->setProPicture($newPicture);
                try {
                    
                    // déplacement du fichier vers le répertoire de destination sur le serveur
                    $pictureFile->move(
                        $this->getParameter('photo_directory'),
                        $newPicture
                    );

                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($product);
                    $entityManager->flush();

                } catch (FileException $e) {
                    // gestion de l'erreur si le déplacement ne s'est pas effectué
                        }
                    }
        
                $this->addFlash(
                    'success',
                    'Produit ajouté avec succès !!'
                );

            return $this->redirectToRoute('products_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('products/new.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
            'categories' => $categoriesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="products_show", methods={"GET"})
     */
    public function show(Products $product, CategoriesRepository $categoriesRepository): Response
    {
        return $this->render('products/show.html.twig', [
            'product' => $product,
            'categories' => $categoriesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="products_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Products $product, CategoriesRepository $categoriesRepository): Response
    {
        $form = $this->createForm(ProductsType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // récupération de la saisi sur l'upload
           // dd($form['picture2']->getData());
            $pictureFile = $form['pro_picture']->getData();
            $this->getDoctrine()->getManager()->flush();

            // $imgName = strstr($pictureFile->getClientOriginalName(), '.', true);
            $idProduct = $product->getId();

            // vérification s'il y a un upload photo
            if ($pictureFile) {
                // renommage du fichier
                // nom du fichier + extension
                $newPicture = $idProduct . '.' . $pictureFile->guessExtension();
                // assignation de la valeur à la propriété picture à l'aide du setter
                $product->setProPicture($newPicture);
                 try {
                        // déplacement du fichier vers le répertoire de destination sur le serveur
                        $pictureFile->move(
                        $this->getParameter('photo_directory'),
                        $newPicture
                    );

                    // Update
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($product);
                    $entityManager->flush();

                } catch (FileException $e) {
                    // gestion de l'erreur si le déplacement ne s'est pas effectué
                    echo "Fichier non valide ";
                }
            }

            $this->addFlash(
                'success',
                'Intervention terminée'
            );

            return $this->redirectToRoute('products_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('products/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
            'categories' => $categoriesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="products_delete", methods={"POST"})
     */
    public function delete(Request $request, Products $product): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($product);
            $entityManager->flush();
        }

        return $this->redirectToRoute('products_index', [], Response::HTTP_SEE_OTHER);
    }
}
