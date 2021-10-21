<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdersRepository::class)
 */
class Orders
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ord_order_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ord_payment_date;

    /**
     * @ORM\Column(type="date")
     */
    private $ord_ship_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ord_reception_date;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $ord_order_address;

    /**
     * @ORM\ManyToOne(targetEntity=Customers::class, inversedBy="ord_cus_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cus_id;

    /**
     * @ORM\OneToMany(targetEntity=OrdersDetails::class, mappedBy="ord_id", orphanRemoval=true)
     */
    private $ode_ord_id;

    public function __construct()
    {
        $this->ode_ord_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdOrderDate(): ?\DateTimeInterface
    {
        return $this->ord_order_date;
    }

    public function setOrdOrderDate(\DateTimeInterface $ord_order_date): self
    {
        $this->ord_order_date = $ord_order_date;

        return $this;
    }

    public function getOrdPaymentDate(): ?\DateTimeInterface
    {
        return $this->ord_payment_date;
    }

    public function setOrdPaymentDate(\DateTimeInterface $ord_payment_date): self
    {
        $this->ord_payment_date = $ord_payment_date;

        return $this;
    }

    public function getOrdShipDate(): ?\DateTimeInterface
    {
        return $this->ord_ship_date;
    }

    public function setOrdShipDate(\DateTimeInterface $ord_ship_date): self
    {
        $this->ord_ship_date = $ord_ship_date;

        return $this;
    }

    public function getOrdReceptionDate(): ?\DateTimeInterface
    {
        return $this->ord_reception_date;
    }

    public function setOrdReceptionDate(\DateTimeInterface $ord_reception_date): self
    {
        $this->ord_reception_date = $ord_reception_date;

        return $this;
    }

    public function getOrdOrderAddress(): ?string
    {
        return $this->ord_order_address;
    }

    public function setOrdOrderAddress(string $ord_order_address): self
    {
        $this->ord_order_address = $ord_order_address;

        return $this;
    }

    public function getCusId(): ?Customers
    {
        return $this->cus_id;
    }

    public function setCusId(?Customers $cus_id): self
    {
        $this->cus_id = $cus_id;

        return $this;
    }

    /**
     * @return Collection|OrdersDetails[]
     */
    public function getOdeOrdId(): Collection
    {
        return $this->ode_ord_id;
    }

    public function addOdeOrdId(OrdersDetails $odeOrdId): self
    {
        if (!$this->ode_ord_id->contains($odeOrdId)) {
            $this->ode_ord_id[] = $odeOrdId;
            $odeOrdId->setOrdId($this);
        }

        return $this;
    }

    public function removeOdeOrdId(OrdersDetails $odeOrdId): self
    {
        if ($this->ode_ord_id->removeElement($odeOrdId)) {
            // set the owning side to null (unless already changed)
            if ($odeOrdId->getOrdId() === $this) {
                $odeOrdId->setOrdId(null);
            }
        }

        return $this;
    }
}
