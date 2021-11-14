<?php

namespace App\Entity;

use App\Repository\CountriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountriesRepository::class)
 */
class Countries
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string", length=2)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $cou_name;

    /**
     * @ORM\OneToMany(targetEntity=Suppliers::class, mappedBy="cou")
     */
    private $suppliers;

    public function __construct()
    {
        $this->suppliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouName(): ?string
    {
        return $this->cou_name;
    }

    public function setCouName(string $cou_name): self
    {
        $this->cou_name = $cou_name;

        return $this;
    }

    /**
     * @return Collection|Suppliers[]
     */
    public function getSuppliers(): Collection
    {
        return $this->suppliers;
    }

    public function addSupplier(Suppliers $supplier): self
    {
        if (!$this->suppliers->contains($supplier)) {
            $this->suppliers[] = $supplier;
            $supplier->setCou($this);
        }

        return $this;
    }

    public function removeSupplier(Suppliers $supplier): self
    {
        if ($this->suppliers->removeElement($supplier)) {
            // set the owning side to null (unless already changed)
            if ($supplier->getCou() === $this) {
                $supplier->setCou(null);
            }
        }

        return $this;
    }
}
