<?php

namespace App\Entity;

use App\Repository\CustomersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomersRepository::class)
 */
class Customers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cus_category;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cus_payment_type;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $cus_reference;

    /**
     * @ORM\ManyToOne(targetEntity=Professionals::class, inversedBy="cus_prf_id")
     */
    private $prf_id;

    /**
     * @ORM\ManyToOne(targetEntity=Particuliars::class, inversedBy="cus_par_id")
     */
    private $par_id;

    /**
     * @ORM\OneToMany(targetEntity=Orders::class, mappedBy="cus_id", orphanRemoval=true)
     */
    private $ord_cus_id;

    public function __construct()
    {
        $this->ord_cus_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCusCategory(): ?bool
    {
        return $this->cus_category;
    }

    public function setCusCategory(bool $cus_category): self
    {
        $this->cus_category = $cus_category;

        return $this;
    }

    public function getCusPaymentType(): ?bool
    {
        return $this->cus_payment_type;
    }

    public function setCusPaymentType(bool $cus_payment_type): self
    {
        $this->cus_payment_type = $cus_payment_type;

        return $this;
    }

    public function getCusReference(): ?string
    {
        return $this->cus_reference;
    }

    public function setCusReference(?string $cus_reference): self
    {
        $this->cus_reference = $cus_reference;

        return $this;
    }

    public function getPrfId(): ?Professionals
    {
        return $this->prf_id;
    }

    public function setPrfId(?Professionals $prf_id): self
    {
        $this->prf_id = $prf_id;

        return $this;
    }

    public function getParId(): ?Particuliars
    {
        return $this->par_id;
    }

    public function setParId(?Particuliars $par_id): self
    {
        $this->par_id = $par_id;

        return $this;
    }

    /**
     * @return Collection|Orders[]
     */
    public function getOrdCusId(): Collection
    {
        return $this->ord_cus_id;
    }

    public function addOrdCusId(Orders $ordCusId): self
    {
        if (!$this->ord_cus_id->contains($ordCusId)) {
            $this->ord_cus_id[] = $ordCusId;
            $ordCusId->setCusId($this);
        }

        return $this;
    }

    public function removeOrdCusId(Orders $ordCusId): self
    {
        if ($this->ord_cus_id->removeElement($ordCusId)) {
            // set the owning side to null (unless already changed)
            if ($ordCusId->getCusId() === $this) {
                $ordCusId->setCusId(null);
            }
        }

        return $this;
    }
}
