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
     * @ORM\ManyToOne(targetEntity=Cars::class)
     */
    private $fkCars;

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

    public function getFkCars(): ?Cars
    {
        return $this->fkCars;
    }

    public function setFkCars(?Cars $fkCars): self
    {
        $this->fkCars = $fkCars;

        return $this;
    }
}
