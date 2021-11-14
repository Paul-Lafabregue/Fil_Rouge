<?php

namespace App\Controller;

use App\Entity\Products;
use App\Entity\User;
use App\Form\ProductsType;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Repository\ProductsRepository;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @IsGranted("ROLE_ADMIN")
 * * @Route("/admin")
 */

 class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin_index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
   

    /**
     * @Route("/products", name="admin_products", methods={"GET"})
     */
    public function products_index(ProductsRepository $productsRepository): Response
    {
        return $this->render('admin/products/index.html.twig', [
            'products' => $productsRepository->findAll(),
        ]);
    }

       /**
     * @Route("/products/{id}", name="admin_show_product", methods={"GET"})
     */
    public function show(Products $product): Response
    {
        return $this->render('admin/products/show.html.twig', [
            'product' => $product,
        ]);
    }
    
   
 /**
     * @Route("products/new", name="admin_new_product", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $product = new Products();
        $product->setProDateAdd(new \DateTime('now'));
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

        return $this->render('admin/products/new.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }
   
   
    /**
     * @Route("products/{id}/edit", name="admin_edit_product", methods={"GET","POST"})
     * @param Request $request
     * @param Products $product
     * @return Response
     */
    public function edit(Request $request, Products $product): Response
    {
        // récupération de l'id du produit
        $idProduct = $product->getId();
        $product->setProDateModif(new \DateTime('now'));
        $form = $this->createForm(ProductsType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // récupération de la saisi sur l'upload
            $pictureFile = $form['pro_picture']->getData();
            $this->getDoctrine()->getManager()->flush();
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

            return $this->redirectToRoute('products_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/products/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/products/{id}", name="admin_delete_product", methods={"POST"})
     */
    public function delete(Request $request, Products $product): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($product);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin/products_index', [], Response::HTTP_SEE_OTHER);
    }


    //  ====== USERS ====== 


    /**
     * @Route("/user/", name="user_index", methods={"GET"})
     */
    public function user_index(UserRepository $userRepository): Response
    {
        return $this->render('admin/user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/user/new", name="user_new", methods={"GET","POST"})
     */
    public function user_new(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user/{id}", name="user_show", methods={"GET"})
     */
    public function user_show(User $user): Response
    {
        return $this->render('admin/user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/user/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function user_edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("//user{id}", name="user_delete", methods={"POST"})
     */
    public function user_delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index', [], Response::HTTP_SEE_OTHER);
    }

}
