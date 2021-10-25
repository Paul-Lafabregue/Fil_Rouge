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
     * @ORM\Column(type="string", length=150)
     */
    private $pro_name;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=4)
     */
    private $pro_price;

    /**
     * @ORM\Column(type="decimal", precision=2, scale=2, nullable=true)
     */
    private $pro_vat;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pro_ref;

    /**
     * @ORM\Column(type="integer")
     */
    private $pro_stock;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $pro_wording;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $pro_description;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $pro_picture;

    /**
     * @ORM\Column(type="datetime")
     */
    private $pro_date_add;

    /**
     * @ORM\Column(type="datetime")
     */
    private $pro_date_modif;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="pro_cat_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cat_id;

    /**
     * @ORM\ManyToOne(targetEntity=Suppliers::class, inversedBy="pro_sup_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sup_id;

    /**
     * @ORM\OneToMany(targetEntity=OrdersDetails::class, mappedBy="pro_id", orphanRemoval=true)
     */
    private $ode_pro_id;

    
    public function __construct()
    {
        $this->ode_pro_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProName(): ?string
    {
        return $this->pro_name;
    }

    public function setProName(string $pro_name): self
    {
        $this->pro_name = $pro_name;

        return $this;
    }

    public function getProPrice(): ?string
    {
        return $this->pro_price;
    }

    public function setProPrice(string $pro_price): self
    {
        $this->pro_price = $pro_price;

        return $this;
    }

    public function getProVat(): ?string
    {
        return $this->pro_vat;
    }

    public function setProVat(?string $pro_vat): self
    {
        $this->pro_vat = $pro_vat;

        return $this;
    }

    public function getProRef(): ?string
    {
        return $this->pro_ref;
    }

    public function setProRef(string $pro_ref): self
    {
        $this->pro_ref = $pro_ref;

        return $this;
    }

    public function getProStock(): ?int
    {
        return $this->pro_stock;
    }

    public function setProStock(int $pro_stock): self
    {
        $this->pro_stock = $pro_stock;

        return $this;
    }

    public function getProWording(): ?string
    {
        return $this->pro_wording;
    }

    public function setProWording(string $pro_wording): self
    {
        $this->pro_wording = $pro_wording;

        return $this;
    }

    public function getProDescription(): ?string
    {
        return $this->pro_description;
    }

    public function setProDescription(?string $pro_description): self
    {
        $this->pro_description = $pro_description;

        return $this;
    }

    public function getProPicture(): ?string
    {
        return $this->pro_picture;
    }

    public function setProPicture(string $pro_picture): self
    {
        $this->pro_picture = $pro_picture;

        return $this;
    }

    public function getProDateAdd(): ?\DateTimeInterface
    {
        return $this->pro_date_add;
    }

    public function setProDateAdd(\DateTimeInterface $pro_date_add): self
    {
        $this->pro_date_add = $pro_date_add;

        return $this;
    }

    public function getProDateModif(): ?\DateTimeInterface
    {
        return $this->pro_date_modif;
    }

    public function setProDateModif(\DateTimeInterface $pro_date_modif): self
    {
        $this->pro_date_modif = $pro_date_modif;

        return $this;
    }

    public function getCatId(): ?Categories
    {
        return $this->cat_id;
    }

    public function setCatId(?Categories $cat_id): self
    {
        $this->cat_id = $cat_id;

        return $this;
    }

    public function getSupId(): ?Suppliers
    {
        return $this->sup_id;
    }

    public function setSupId(?Suppliers $sup_id): self
    {
        $this->sup_id = $sup_id;

        return $this;
    }

    /**
     * @return Collection|OrdersDetails[]
     */
    public function getOdeProId(): Collection
    {
        return $this->ode_pro_id;
    }

    public function addOdeProId(OrdersDetails $odeProId): self
    {
        if (!$this->ode_pro_id->contains($odeProId)) {
            $this->ode_pro_id[] = $odeProId;
            $odeProId->setProId($this);
        }

        return $this;
    }

    public function removeOdeProId(OrdersDetails $odeProId): self
    {
        if ($this->ode_pro_id->removeElement($odeProId)) {
            // set the owning side to null (unless already changed)
            if ($odeProId->getProId() === $this) {
                $odeProId->setProId(null);
            }
        }

        return $this;
    }
}
