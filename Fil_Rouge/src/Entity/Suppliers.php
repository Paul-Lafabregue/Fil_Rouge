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
     * @ORM\Column(type="string", length=150)
     */
    private $sup_company_name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sup_type;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $sup_address;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $sup_zipcode;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sup_city;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $sup_contact_name;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $sup_phone;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $sup_mail;

    /**
     * @ORM\ManyToOne(targetEntity=Countries::class, inversedBy="sup_cou_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cou_id;

    /**
     * @ORM\OneToMany(targetEntity=Products::class, mappedBy="sup_id")
     */
    private $pro_sup_id;

    public function __construct()
    {
        $this->pro_sup_id = new ArrayCollection();
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

    public function getSupType(): ?bool
    {
        return $this->sup_type;
    }

    public function setSupType(bool $sup_type): self
    {
        $this->sup_type = $sup_type;

        return $this;
    }

    public function getSupAddress(): ?string
    {
        return $this->sup_address;
    }

    public function setSupAddress(string $sup_address): self
    {
        $this->sup_address = $sup_address;

        return $this;
    }

    public function getSupZipcode(): ?string
    {
        return $this->sup_zipcode;
    }

    public function setSupZipcode(string $sup_zipcode): self
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

    public function getSupContactName(): ?string
    {
        return $this->sup_contact_name;
    }

    public function setSupContactName(string $sup_contact_name): self
    {
        $this->sup_contact_name = $sup_contact_name;

        return $this;
    }

    public function getSupPhone(): ?string
    {
        return $this->sup_phone;
    }

    public function setSupPhone(string $sup_phone): self
    {
        $this->sup_phone = $sup_phone;

        return $this;
    }

    public function getSupMail(): ?string
    {
        return $this->sup_mail;
    }

    public function setSupMail(string $sup_mail): self
    {
        $this->sup_mail = $sup_mail;

        return $this;
    }

    public function getCouId(): ?Countries
    {
        return $this->cou_id;
    }

    public function setCouId(?Countries $cou_id): self
    {
        $this->cou_id = $cou_id;

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getProSupId(): Collection
    {
        return $this->pro_sup_id;
    }

    public function addProSupId(Products $proSupId): self
    {
        if (!$this->pro_sup_id->contains($proSupId)) {
            $this->pro_sup_id[] = $proSupId;
            $proSupId->setSupId($this);
        }

        return $this;
    }

    public function removeProSupId(Products $proSupId): self
    {
        if ($this->pro_sup_id->removeElement($proSupId)) {
            // set the owning side to null (unless already changed)
            if ($proSupId->getSupId() === $this) {
                $proSupId->setSupId(null);
            }
        }

        return $this;
    }
}
