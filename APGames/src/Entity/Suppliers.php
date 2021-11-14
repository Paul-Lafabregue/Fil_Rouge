<?php

namespace App\Entity;

use App\Repository\SuppliersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuppliersRepository::class)
 */
class Suppliers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sup_company_name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $sup_contact_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sup_address;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $sup_zipcode;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sup_city;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $sup_phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sup_mail;

    /**
     * @ORM\OneToMany(targetEntity=Products::class, mappedBy="pro_sup")
     */
    private $products;

    /**
     * @ORM\ManyToOne(targetEntity=Countries::class, inversedBy="suppliers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cou;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSupCompanyName(): ?string
    {
        return $this->sup_company_name;
    }

    public function setSupCompanyName(string $sup_company_name): self
    {
        $this->sup_company_name = $sup_company_name;

        return $this;
    }

    public function getSupContactName(): ?string
    {
        return $this->sup_contact_name;
    }

    public function setSupContactName(?string $sup_contact_name): self
    {
        $this->sup_contact_name = $sup_contact_name;

        return $this;
    }

    public function getSupAddress(): ?string
    {
        return $this->sup_address;
    }

    public function setSupAddress(?string $sup_address): self
    {
        $this->sup_address = $sup_address;

        return $this;
    }

    public function getSupZipcode(): ?int
    {
        return $this->sup_zipcode;
    }

    public function setSupZipcode(int $sup_zipcode): self
    {
        $this->sup_zipcode = $sup_zipcode;

        return $this;
    }

    public function getSupCity(): ?string
    {
        return $this->sup_city;
    }

    public function setSupCity(string $sup_city): self
    {
        $this->sup_city = $sup_city;

        return $this;
    }

    public function getSupPhone(): ?string
    {
        return $this->sup_phone;
    }

    public function setSupPhone(?string $sup_phone): self
    {
        $this->sup_phone = $sup_phone;

        return $this;
    }

    public function getSupMail(): ?string
    {
        return $this->sup_mail;
    }

    public function setSupMail(?string $sup_mail): self
    {
        $this->sup_mail = $sup_mail;

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
            $product->setProSup($this);
        }

        return $this;
    }

    public function removeProduct(Products $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getProSup() === $this) {
                $product->setProSup(null);
            }
        }

        return $this;
    }

    public function getCou(): ?Countries
    {
        return $this->cou;
    }

    public function setCou(?Countries $cou): self
    {
        $this->cou = $cou;

        return $this;
    }
}
