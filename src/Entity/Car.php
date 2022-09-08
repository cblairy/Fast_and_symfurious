<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
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
    private $brand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="float")
     */
    private $cylinder;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxSpeed;

    /**
     * @ORM\Column(type="integer")
     */
    private $estimatedValue;

    /**
     * @ORM\OneToOne(targetEntity=Pilot::class, mappedBy="fkCar", cascade={"persist", "remove"})
     */
    private $pilot;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getCylinder(): ?float
    {
        return $this->cylinder;
    }

    public function setCylinder(float $cylinder): self
    {
        $this->cylinder = $cylinder;

        return $this;
    }

    public function getMaxSpeed(): ?int
    {
        return $this->maxSpeed;
    }

    public function setMaxSpeed(int $maxSpeed): self
    {
        $this->maxSpeed = $maxSpeed;

        return $this;
    }

    public function getEstimatedValue(): ?int
    {
        return $this->estimatedValue;
    }

    public function setEstimatedValue(int $estimatedValue): self
    {
        $this->estimatedValue = $estimatedValue;

        return $this;
    }

    public function getPilot(): ?Pilot
    {
        return $this->pilot;
    }

    public function setPilot(?Pilot $pilot): self
    {
        // unset the owning side of the relation if necessary
        if ($pilot === null && $this->pilot !== null) {
            $this->pilot->setFkCar(null);
        }

        // set the owning side of the relation if necessary
        if ($pilot !== null && $pilot->getFkCar() !== $this) {
            $pilot->setFkCar($this);
        }

        $this->pilot = $pilot;

        return $this;
    }
}
