<?php

namespace App\Entity;

use App\Repository\BudgetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BudgetRepository::class)
 */
class Budget
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $deliver_date;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="budget")
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity=ProductCharacteristics::class)
     */
    private $productCharacteristics;

    public function __construct()
    {
        $this->productCharacteristics = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeliverDate(): ?\DateTimeInterface
    {
        return $this->deliver_date;
    }

    public function setDeliverDate(?\DateTimeInterface $deliver_date): self
    {
        $this->deliver_date = $deliver_date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|ProductCharacteristics[]
     */
    public function getProductCharacteristics(): Collection
    {
        return $this->productCharacteristics;
    }

    public function addProductCharacteristic(ProductCharacteristics $productCharacteristic): self
    {
        if (!$this->productCharacteristics->contains($productCharacteristic)) {
            $this->productCharacteristics[] = $productCharacteristic;
        }

        return $this;
    }

    public function removeProductCharacteristic(ProductCharacteristics $productCharacteristic): self
    {
        $this->productCharacteristics->removeElement($productCharacteristic);

        return $this;
    }
}
