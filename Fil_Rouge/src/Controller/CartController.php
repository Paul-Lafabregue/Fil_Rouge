<?php

namespace App\Controller;

use App\Entity\Products;
use App\Repository\ProductsRepository;
use App\Repository\CategoriesRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart_index")
     */
    public function index(SessionInterface $session, ProductsRepository $productsRepository, CategoriesRepository $categoriesRepository): Response
    {
        $panier = $session->get("panier", []);

        // On "fabrique" les données
        $dataPanier = [];
        $total = 0;

        foreach($panier as $id => $quantite){
            $product = $productsRepository->find($id);
            $dataPanier[] = [
                "produit" => $product,
                "quantite" => $quantite
            ];
            $total += $product->getProPrice() * $quantite;
        }
        
        return $this->render('cart/index.html.twig', [
            'dataPanier' => $dataPanier,
            'total' => $total,
            'categories' => $categoriesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/add/{id}", name="cart_add")
     */
    public function add(Products $product, SessionInterface $session)
    {
        // Récupération du panier actuel
        $panier = $session->get("panier", []);
        $id = $product->getId();

        if(!empty($panier[$id])){
            $panier[$id]++;
        }else{
            $panier[$id] = 1;
        }
        //Sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/remove/{id}", name="cart_remove")
     */
    public function remove(Products $product, SessionInterface $session)
    {
        // Récupération du panier actuel
        $panier = $session->get("panier", []);
        $id = $product->getId();

        if(!empty($panier[$id])){
            if($panier[$id] > 1){
                $panier[$id]--;
            }
        }else{
            unset($panier[$id]);
        }
    

        //Sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/delete/{id}", name="cart_delete")
     */
    public function delete(Products $product, SessionInterface $session)
    {
        // Récupération du panier actuel
        $panier = $session->get("panier", []);
        $id = $product->getId();

        if(!empty($panier[$id])){
            unset($panier[$id]);
        }
        //Sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/delete", name="delete_all")
     */
    public function deleteAll(SessionInterface $session)
    {
        $session->remove("panier");

        return $this->redirectToRoute("cart_index");
    }
}
