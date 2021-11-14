<?php

namespace App\Entity;

use App\Repository\SubcategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubcategoriesRepository::class)
 */
class Subcategories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sub_cat_name;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="subcategories")
     */
    private $cat;

    /**
     * @ORM\OneToMany(targetEntity=Products::class, mappedBy="pro_sub_cat")
     */
    private $products;


    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubCatName(): ?string
    {
        return $this->sub_cat_name;
    }

    public function setSubCatName(string $sub_cat_name): self
    {
        $this->sub_cat_name = $sub_cat_name;

        return $this;
    }

    public function getCat(): ?Categories
    {
        return $this->cat;
    }

    public function setCat(?Categories $cat): self
    {
        $this->cat = $cat;

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Products $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setProSubCat($this);
        }

        return $this;
    }

    public function removeProduct(Products $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getProSubCat() === $this) {
                $product->setProSubCat(null);
            }
        }

        return $this;
    }


}
