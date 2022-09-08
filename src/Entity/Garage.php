<?php

namespace App\Entity;

use App\Repository\GarageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GarageRepository::class)
 */
class Garage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_out;

    /**
     * @ORM\ManyToOne(targetEntity=Car::class)
     */
    private $Cars;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isIsOut(): ?bool
    {
        return $this->is_out;
    }

    public function setIsOut(?bool $is_out): self
    {
        $this->is_out = $is_out;

        return $this;
    }

    public function getCars(): ?Car
    {
        return $this->Cars;
    }

    public function setCars(?Car $Cars): self
    {
        $this->Cars = $Cars;

        return $this;
    }
}
