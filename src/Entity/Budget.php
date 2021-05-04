<?php

namespace App\Entity;

use App\Repository\BudgetRepository;
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
}
