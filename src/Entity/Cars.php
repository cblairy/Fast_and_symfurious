<?php

namespace App\Entity;

use App\Repository\CarsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarsRepository::class)
 */
class Cars
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
     * @ORM\Column(type="string", length=255)
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

    public function getCylinder(): ?string
    {
        return $this->cylinder;
    }

    public function setCylinder(string $cylinder): self
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
}
