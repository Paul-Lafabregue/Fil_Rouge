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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ord_payment_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ord_status;

    /**
     * @ORM\OneToMany(targetEntity=OrdersDetails::class, mappedBy="ode_ord")
     */
    private $ordersDetails;


    public function __construct()
    {
        $this->ordersDetails = new ArrayCollection();
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

    public function setOrdPaymentDate(?\DateTimeInterface $ord_payment_date): self
    {
        $this->ord_payment_date = $ord_payment_date;

        return $this;
    }

    public function getOrdStatus(): ?string
    {
        return $this->ord_status;
    }

    public function setOrdStatus(?string $ord_status): self
    {
        $this->ord_status = $ord_status;

        return $this;
    }

    /**
     * @return Collection|OrdersDetails[]
     */
    public function getOrdersDetails(): Collection
    {
        return $this->ordersDetails;
    }

    public function addOrdersDetail(OrdersDetails $ordersDetail): self
    {
        if (!$this->ordersDetails->contains($ordersDetail)) {
            $this->ordersDetails[] = $ordersDetail;
            $ordersDetail->setOdeOrd($this);
        }

        return $this;
    }

    public function removeOrdersDetail(OrdersDetails $ordersDetail): self
    {
        if ($this->ordersDetails->removeElement($ordersDetail)) {
            // set the owning side to null (unless already changed)
            if ($ordersDetail->getOdeOrd() === $this) {
                $ordersDetail->setOdeOrd(null);
            }
        }

        return $this;
    }

}
