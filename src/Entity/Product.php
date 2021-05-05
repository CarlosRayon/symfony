<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=ProductCharacteristics::class, mappedBy="product")
     */
    private $ProductCharacteristics;

    /**
     * @ORM\OneToMany(targetEntity=Budget::class, mappedBy="product")
     */
    private $budget;

    public function __construct()
    {
        $this->ProductCharacteristics = new ArrayCollection();
        $this->budget = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|ProductCharacteristics[]
     */
    public function getProductCharacteristics(): Collection
    {
        return $this->ProductCharacteristics;
    }

    public function addProductCharacteristic(ProductCharacteristics $productCharacteristic): self
    {
        if (!$this->ProductCharacteristics->contains($productCharacteristic)) {
            $this->ProductCharacteristics[] = $productCharacteristic;
            $productCharacteristic->setProduct($this);
        }

        return $this;
    }

    public function removeProductCharacteristic(ProductCharacteristics $productCharacteristic): self
    {
        if ($this->ProductCharacteristics->removeElement($productCharacteristic)) {
            // set the owning side to null (unless already changed)
            if ($productCharacteristic->getProduct() === $this) {
                $productCharacteristic->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Budget[]
     */
    public function getBudget(): Collection
    {
        return $this->budget;
    }

    public function addBudget(Budget $budget): self
    {
        if (!$this->budget->contains($budget)) {
            $this->budget[] = $budget;
            $budget->setProduct($this);
        }

        return $this;
    }

    public function removeBudget(Budget $budget): self
    {
        if ($this->budget->removeElement($budget)) {
            // set the owning side to null (unless already changed)
            if ($budget->getProduct() === $this) {
                $budget->setProduct(null);
            }
        }

        return $this;
    }

}
