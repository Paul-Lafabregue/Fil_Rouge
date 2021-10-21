<?php

namespace App\Entity;

use App\Repository\ProfessionalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfessionalsRepository::class)
 */
class Professionals
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
    private $prf_company_name;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $prf_contact_name;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $prf_address;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prf_zipcode;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prf_city;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $prf_mail;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $prf_phone;

    /**
     * @ORM\ManyToOne(targetEntity=Countries::class, inversedBy="prf_cou_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cou_id;

    /**
     * @ORM\OneToMany(targetEntity=Customers::class, mappedBy="prf_id")
     */
    private $cus_prf_id;

    public function __construct()
    {
        $this->cus_prf_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrfCompanyName(): ?string
    {
        return $this->prf_company_name;
    }

    public function setPrfCompanyName(string $prf_company_name): self
    {
        $this->prf_company_name = $prf_company_name;

        return $this;
    }

    public function getPrfContactName(): ?string
    {
        return $this->prf_contact_name;
    }

    public function setPrfContactName(string $prf_contact_name): self
    {
        $this->prf_contact_name = $prf_contact_name;

        return $this;
    }

    public function getPrfAddress(): ?string
    {
        return $this->prf_address;
    }

    public function setPrfAddress(string $prf_address): self
    {
        $this->prf_address = $prf_address;

        return $this;
    }

    public function getPrfZipcode(): ?string
    {
        return $this->prf_zipcode;
    }

    public function setPrfZipcode(string $prf_zipcode): self
    {
        $this->prf_zipcode = $prf_zipcode;

        return $this;
    }

    public function getPrfCity(): ?string
    {
        return $this->prf_city;
    }

    public function setPrfCity(string $prf_city): self
    {
        $this->prf_city = $prf_city;

        return $this;
    }

    public function getPrfMail(): ?string
    {
        return $this->prf_mail;
    }

    public function setPrfMail(string $prf_mail): self
    {
        $this->prf_mail = $prf_mail;

        return $this;
    }

    public function getPrfPhone(): ?string
    {
        return $this->prf_phone;
    }

    public function setPrfPhone(string $prf_phone): self
    {
        $this->prf_phone = $prf_phone;

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
     * @return Collection|Customers[]
     */
    public function getCusPrfId(): Collection
    {
        return $this->cus_prf_id;
    }

    public function addCusPrfId(Customers $cusPrfId): self
    {
        if (!$this->cus_prf_id->contains($cusPrfId)) {
            $this->cus_prf_id[] = $cusPrfId;
            $cusPrfId->setPrfId($this);
        }

        return $this;
    }

    public function removeCusPrfId(Customers $cusPrfId): self
    {
        if ($this->cus_prf_id->removeElement($cusPrfId)) {
            // set the owning side to null (unless already changed)
            if ($cusPrfId->getPrfId() === $this) {
                $cusPrfId->setPrfId(null);
            }
        }

        return $this;
    }
}
