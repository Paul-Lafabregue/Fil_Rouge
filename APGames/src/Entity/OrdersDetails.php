<?php

namespace App\Entity;

use App\Repository\OrdersDetailsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrdersDetailsRepository::class)
 */
class OrdersDetails
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=7, scale=2)
     */
    private $ode_unit_price;

    /**
     * @ORM\Column(type="integer")
     */
    private $ode_quantity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ode_discount;

    /**
     * @ORM\ManyToOne(targetEntity=Orders::class, inversedBy="ordersDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ode_ord;

    /**
     * @ORM\ManyToOne(targetEntity=Products::class, inversedBy="ordersDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ode_pro;


    public function __construct()
    {
        $this->pro = new ArrayCollection();
        $this->ord = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOdeUnitPrice(): ?string
    {
        return $this->ode_unit_price;
    }

    public function setOdeUnitPrice(string $ode_unit_price): self
    {
        $this->ode_unit_price = $ode_unit_price;

        return $this;
    }

    public function getOdeQuantity(): ?int
    {
        return $this->ode_quantity;
    }

    public function setOdeQuantity(int $ode_quantity): self
    {
        $this->ode_quantity = $ode_quantity;

        return $this;
    }

    public function getOdeDiscount(): ?int
    {
        return $this->ode_discount;
    }

    public function setOdeDiscount(?int $ode_discount): self
    {
        $this->ode_discount = $ode_discount;

        return $this;
    }

    public function getOdeOrd(): ?Orders
    {
        return $this->ode_ord;
    }

    public function setOdeOrd(?Orders $ode_ord): self
    {
        $this->ode_ord = $ode_ord;

        return $this;
    }

    public function getOdePro(): ?Products
    {
        return $this->ode_pro;
    }

    public function setOdePro(?Products $ode_pro): self
    {
        $this->ode_pro = $ode_pro;

        return $this;
    }

}
