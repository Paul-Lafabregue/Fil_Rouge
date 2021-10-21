<?php

namespace App\Entity;

use App\Repository\CountriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountriesRepository::class)
 */
class Countries
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
    private $cou_name;

    /**
     * @ORM\OneToMany(targetEntity=Particuliars::class, mappedBy="cou_id")
     */
    private $par_cou_id;

    /**
     * @ORM\OneToMany(targetEntity=Professionals::class, mappedBy="cou_id")
     */
    private $prf_cou_id;

    /**
     * @ORM\OneToMany(targetEntity=Suppliers::class, mappedBy="cou_id", orphanRemoval=true)
     */
    private $sup_cou_id;

    public function __construct()
    {
        $this->par_cou_id = new ArrayCollection();
        $this->prf_cou_id = new ArrayCollection();
        $this->sup_cou_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouName(): ?string
    {
        return $this->cou_name;
    }

    public function setCouName(string $cou_name): self
    {
        $this->cou_name = $cou_name;

        return $this;
    }

    /**
     * @return Collection|Particuliars[]
     */
    public function getParCouId(): Collection
    {
        return $this->par_cou_id;
    }

    public function addParCouId(Particuliars $parCouId): self
    {
        if (!$this->par_cou_id->contains($parCouId)) {
            $this->par_cou_id[] = $parCouId;
            $parCouId->setCouId($this);
        }

        return $this;
    }

    public function removeParCouId(Particuliars $parCouId): self
    {
        if ($this->par_cou_id->removeElement($parCouId)) {
            // set the owning side to null (unless already changed)
            if ($parCouId->getCouId() === $this) {
                $parCouId->setCouId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Professionals[]
     */
    public function getPrfCouId(): Collection
    {
        return $this->prf_cou_id;
    }

    public function addPrfCouId(Professionals $prfCouId): self
    {
        if (!$this->prf_cou_id->contains($prfCouId)) {
            $this->prf_cou_id[] = $prfCouId;
            $prfCouId->setCouId($this);
        }

        return $this;
    }

    public function removePrfCouId(Professionals $prfCouId): self
    {
        if ($this->prf_cou_id->removeElement($prfCouId)) {
            // set the owning side to null (unless already changed)
            if ($prfCouId->getCouId() === $this) {
                $prfCouId->setCouId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Suppliers[]
     */
    public function getSupCouId(): Collection
    {
        return $this->sup_cou_id;
    }

    public function addSupCouId(Suppliers $supCouId): self
    {
        if (!$this->sup_cou_id->contains($supCouId)) {
            $this->sup_cou_id[] = $supCouId;
            $supCouId->setCouId($this);
        }

        return $this;
    }

    public function removeSupCouId(Suppliers $supCouId): self
    {
        if ($this->sup_cou_id->removeElement($supCouId)) {
            // set the owning side to null (unless already changed)
            if ($supCouId->getCouId() === $this) {
                $supCouId->setCouId(null);
            }
        }

        return $this;
    }
}
