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
     * @ORM\Column(type="string", length=50)
     */
    private $pro_name;

    /**
     * @ORM\Column(type="decimal", precision=7, scale=2, nullable=true)
     */
    private $pro_price;

    /**
     * @ORM\Column(type="decimal", precision=7, scale=2, nullable=true)
     */
    private $pro_vat;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $pro_ref;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pro_stock;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pro_wording;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $pro_description;

    /**
     * @ORM\Column(type="string", length=7, nullable=true)
     */
    private $pro_picture;

    /**
     * @ORM\Column(type="datetime")
     */
    private $pro_date_add;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $pro_date_modif;

    /**
     * @ORM\ManyToOne(targetEntity=Suppliers::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pro_sup;


    /**
     * @ORM\ManyToOne(targetEntity=Subcategories::class, inversedBy="products")
     */
    private $pro_sub_cat;

    /**
     * @ORM\OneToMany(targetEntity=OrdersDetails::class, mappedBy="ode_pro")
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

    public function setProPrice(?string $pro_price): self
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

    public function setProStock(?int $pro_stock): self
    {
        $this->pro_stock = $pro_stock;

        return $this;
    }

    public function getProWording(): ?string
    {
        return $this->pro_wording;
    }

    public function setProWording(?string $pro_wording): self
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

    public function setProPicture(?string $pro_picture): self
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

    public function setProDateModif(?\DateTimeInterface $pro_date_modif): self
    {
        $this->pro_date_modif = $pro_date_modif;

        return $this;
    }

    public function getProSup(): ?Suppliers
    {
        return $this->pro_sup;
    }

    public function setProSup(?Suppliers $pro_sup): self
    {
        $this->pro_sup = $pro_sup;

        return $this;
    }

    public function getProSubCat(): ?Subcategories
    {
        return $this->pro_sub_cat;
    }

    public function setProSubCat(?Subcategories $pro_sub_cat): self
    {
        $this->pro_sub_cat = $pro_sub_cat;

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
            $ordersDetail->setOdePro($this);
        }

        return $this;
    }

    public function removeOrdersDetail(OrdersDetails $ordersDetail): self
    {
        if ($this->ordersDetails->removeElement($ordersDetail)) {
            // set the owning side to null (unless already changed)
            if ($ordersDetail->getOdePro() === $this) {
                $ordersDetail->setOdePro(null);
            }
        }

        return $this;
    }

}
