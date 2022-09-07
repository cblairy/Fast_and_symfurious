<?php

namespace App\Entity;

use App\Repository\RacesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RacesRepository::class)
 */
class Races
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="json")
     */
    private $startGrid = [];

    /**
     * @ORM\Column(type="json")
     */
    private $endGrid = [];

    /**
     * @ORM\OneToOne(targetEntity=Circuit::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkCircuit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStartGrid(): ?array
    {
        return $this->startGrid;
    }

    public function setStartGrid(array $startGrid): self
    {
        $this->startGrid = $startGrid;

        return $this;
    }

    public function getEndGrid(): ?array
    {
        return $this->endGrid;
    }

    public function setEndGrid(array $endGrid): self
    {
        $this->endGrid = $endGrid;

        return $this;
    }

    public function getFkCircuit(): ?Circuit
    {
        return $this->fkCircuit;
    }

    public function setFkCircuit(Circuit $fkCircuit): self
    {
        $this->fkCircuit = $fkCircuit;

        return $this;
    }
}
