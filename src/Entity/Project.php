<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
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
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $places = [];

    /**
     * @ORM\OneToMany(targetEntity=ProjectTask::class, mappedBy="project")
     */
    private $projectTask;

    public function __construct()
    {
        $this->projectTask = new ArrayCollection();
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

    public function getPlaces(): ?array
    {
        return $this->places;
    }

    public function setPlaces(?array $places): self
    {
        $this->places = $places;

        return $this;
    }

    /**
     * @return Collection|ProjectTask[]
     */
    public function getProjectTask(): Collection
    {
        return $this->projectTask;
    }

    public function addProjectTask(ProjectTask $projectTask): self
    {
        if (!$this->projectTask->contains($projectTask)) {
            $this->projectTask[] = $projectTask;
            $projectTask->setProject($this);
        }

        return $this;
    }

    public function removeProjectTask(ProjectTask $projectTask): self
    {
        if ($this->projectTask->removeElement($projectTask)) {
            // set the owning side to null (unless already changed)
            if ($projectTask->getProject() === $this) {
                $projectTask->setProject(null);
            }
        }

        return $this;
    }
}
