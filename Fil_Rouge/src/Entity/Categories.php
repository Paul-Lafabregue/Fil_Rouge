<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $cat_name;

    /**
     * @ORM\OneToMany(targetEntity=Products::class, mappedBy="cat_id")
     */
    private $pro_cat_id;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="cat_parent_id")
     */
    private $cat_parent_id;

    public function __construct()
    {
        $this->pro_cat_id = new ArrayCollection();
        $this->cat_parent_id = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatName(): ?string
    {
        return $this->cat_name;
    }

    public function setCatName(string $cat_name): self
    {
        $this->cat_name = $cat_name;

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getProCatId(): Collection
    {
        return $this->pro_cat_id;
    }

    public function addProCatId(Products $proCatId): self
    {
        if (!$this->pro_cat_id->contains($proCatId)) {
            $this->pro_cat_id[] = $proCatId;
            $proCatId->setCatId($this);
        }

        return $this;
    }

    public function removeProCatId(Products $proCatId): self
    {
        if ($this->pro_cat_id->removeElement($proCatId)) {
            // set the owning side to null (unless already changed)
            if ($proCatId->getCatId() === $this) {
                $proCatId->setCatId(null);
            }
        }

        return $this;
    }

    public function getCatParentId(): ?self
    {
        return $this->cat_parent_id;
    }

    public function setCatParentId(?self $cat_parent_id): self
    {
        $this->cat_parent_id = $cat_parent_id;

        return $this;
    }

    public function addCatParentId(self $catParentId): self
    {
        if (!$this->cat_parent_id->contains($catParentId)) {
            $this->cat_parent_id[] = $catParentId;
            $catParentId->setCatParentId($this);
        }

        return $this;
    }

    public function removeCatParentId(self $catParentId): self
    {
        if ($this->cat_parent_id->removeElement($catParentId)) {
            // set the owning side to null (unless already changed)
            if ($catParentId->getCatParentId() === $this) {
                $catParentId->setCatParentId(null);
            }
        }

        return $this;
    }
}
