<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductsRepository::class)
 */
class Products
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
    private $ProductName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CategoryID;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $QuantityPerUnit;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=4)
     */
    private $UnitPrice;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $UnitsInStock;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $UnitsOnOrder;

    /**
     * @ORM\Column(type="smallint")
     */
    private $ReorderLevel;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Discontinued;

    /**
     * @ORM\ManyToOne(targetEntity=Suppliers::class, inversedBy="ProSupID")
     */
    private $ProSupID;

    /**
     * @ORM\OneToMany(targetEntity=OrderDetails::class, mappedBy="OdeProdID")
     */
    private $OdeProdID;

    public function __construct()
    {
        $this->OdeProdID = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->ProductName;
    }

    public function setProductName(string $ProductName): self
    {
        $this->ProductName = $ProductName;

        return $this;
    }

    public function getCategoryID(): ?int
    {
        return $this->CategoryID;
    }

    public function setCategoryID(?int $CategoryID): self
    {
        $this->CategoryID = $CategoryID;

        return $this;
    }

    public function getQuantityPerUnit(): ?string
    {
        return $this->QuantityPerUnit;
    }

    public function setQuantityPerUnit(?string $QuantityPerUnit): self
    {
        $this->QuantityPerUnit = $QuantityPerUnit;

        return $this;
    }

    public function getUnitPrice(): ?string
    {
        return $this->UnitPrice;
    }

    public function setUnitPrice(string $UnitPrice): self
    {
        $this->UnitPrice = $UnitPrice;

        return $this;
    }

    public function getUnitsInStock(): ?int
    {
        return $this->UnitsInStock;
    }

    public function setUnitsInStock(?int $UnitsInStock): self
    {
        $this->UnitsInStock = $UnitsInStock;

        return $this;
    }

    public function getUnitsOnOrder(): ?int
    {
        return $this->UnitsOnOrder;
    }

    public function setUnitsOnOrder(?int $UnitsOnOrder): self
    {
        $this->UnitsOnOrder = $UnitsOnOrder;

        return $this;
    }

    public function getReorderLevel(): ?int
    {
        return $this->ReorderLevel;
    }

    public function setReorderLevel(int $ReorderLevel): self
    {
        $this->ReorderLevel = $ReorderLevel;

        return $this;
    }

    public function getDiscontinued(): ?bool
    {
        return $this->Discontinued;
    }

    public function setDiscontinued(bool $Discontinued): self
    {
        $this->Discontinued = $Discontinued;

        return $this;
    }

    public function getProSupID(): ?Suppliers
    {
        return $this->ProSupID;
    }

    public function setProSupID(?Suppliers $ProSupID): self
    {
        $this->ProSupID = $ProSupID;

        return $this;
    }

    /**
     * @return Collection|OrderDetails[]
     */
    public function getOdeProdID(): Collection
    {
        return $this->OdeProdID;
    }

    public function addOdeProdID(OrderDetails $odeProdID): self
    {
        if (!$this->OdeProdID->contains($odeProdID)) {
            $this->OdeProdID[] = $odeProdID;
            $odeProdID->setOdeProdID($this);
        }

        return $this;
    }

    public function removeOdeProdID(OrderDetails $odeProdID): self
    {
        if ($this->OdeProdID->removeElement($odeProdID)) {
            // set the owning side to null (unless already changed)
            if ($odeProdID->getOdeProdID() === $this) {
                $odeProdID->setOdeProdID(null);
            }
        }

        return $this;
    }
}
