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
     * @ORM\Column(type="string", length=50)
     */
    private $cat_name;

    /**
     * @ORM\OneToMany(targetEntity=Subcategories::class, mappedBy="cat")
     */
    private $subcategories;

    public function __construct()
    {
        $this->subcategories = new ArrayCollection();
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
     * @return Collection|Subcategories[]
     */
    public function getSubcategories(): Collection
    {
        return $this->subcategories;
    }

    public function addSubcategory(Subcategories $subcategory): self
    {
        if (!$this->subcategories->contains($subcategory)) {
            $this->subcategories[] = $subcategory;
            $subcategory->setCat($this);
        }

        return $this;
    }

    public function removeSubcategory(Subcategories $subcategory): self
    {
        if ($this->subcategories->removeElement($subcategory)) {
            // set the owning side to null (unless already changed)
            if ($subcategory->getCat() === $this) {
                $subcategory->setCat(null);
            }
        }

        return $this;
    }
}
