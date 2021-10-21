<?php

namespace App\Entity;

use App\Repository\OrdersDetailsRepository;
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
     * @ORM\Column(type="decimal", precision=10, scale=4)
     */
    private $ode_unit_price;

    /**
     * @ORM\Column(type="integer")
     */
    private $ode_quantity;

    /**
     * @ORM\Column(type="integer")
     */
    private $ode_discount;

    /**
     * @ORM\ManyToOne(targetEntity=Products::class, inversedBy="ode_pro_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pro_id;

    /**
     * @ORM\ManyToOne(targetEntity=Orders::class, inversedBy="ode_ord_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ord_id;

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

    public function setOdeDiscount(int $ode_discount): self
    {
        $this->ode_discount = $ode_discount;

        return $this;
    }

    public function getProId(): ?Products
    {
        return $this->pro_id;
    }

    public function setProId(?Products $pro_id): self
    {
        $this->pro_id = $pro_id;

        return $this;
    }

    public function getOrdId(): ?Orders
    {
        return $this->ord_id;
    }

    public function setOrdId(?Orders $ord_id): self
    {
        $this->ord_id = $ord_id;

        return $this;
    }
}
