<?php

namespace App\Entity;

use App\Repository\ParticuliarsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticuliarsRepository::class)
 */
class Particuliars
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
    private $par_lastname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $par_firstname;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $par_address;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $par_zipcode;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $par_city;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $par_mail;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $par_phone;

    /**
     * @ORM\ManyToOne(targetEntity=Countries::class, inversedBy="par_cou_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cou_id;

    /**
     * @ORM\OneToMany(targetEntity=Customers::class, mappedBy="par_id")
     */
    private $cus_par_id;

    public function __construct()
    {
        $this->cus_par_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParLastname(): ?string
    {
        return $this->par_lastname;
    }

    public function setParLastname(string $par_lastname): self
    {
        $this->par_lastname = $par_lastname;

        return $this;
    }

    public function getParFirstname(): ?string
    {
        return $this->par_firstname;
    }

    public function setParFirstname(string $par_firstname): self
    {
        $this->par_firstname = $par_firstname;

        return $this;
    }

    public function getParAddress(): ?string
    {
        return $this->par_address;
    }

    public function setParAddress(string $par_address): self
    {
        $this->par_address = $par_address;

        return $this;
    }

    public function getParZipcode(): ?string
    {
        return $this->par_zipcode;
    }

    public function setParZipcode(string $par_zipcode): self
    {
        $this->par_zipcode = $par_zipcode;

        return $this;
    }

    public function getParCity(): ?string
    {
        return $this->par_city;
    }

    public function setParCity(string $par_city): self
    {
        $this->par_city = $par_city;

        return $this;
    }

    public function getParMail(): ?string
    {
        return $this->par_mail;
    }

    public function setParMail(string $par_mail): self
    {
        $this->par_mail = $par_mail;

        return $this;
    }

    public function getParPhone(): ?string
    {
        return $this->par_phone;
    }

    public function setParPhone(string $par_phone): self
    {
        $this->par_phone = $par_phone;

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
    public function getCusParId(): Collection
    {
        return $this->cus_par_id;
    }

    public function addCusParId(Customers $cusParId): self
    {
        if (!$this->cus_par_id->contains($cusParId)) {
            $this->cus_par_id[] = $cusParId;
            $cusParId->setParId($this);
        }

        return $this;
    }

    public function removeCusParId(Customers $cusParId): self
    {
        if ($this->cus_par_id->removeElement($cusParId)) {
            // set the owning side to null (unless already changed)
            if ($cusParId->getParId() === $this) {
                $cusParId->setParId(null);
            }
        }

        return $this;
    }
}
