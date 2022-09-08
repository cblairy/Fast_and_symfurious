<?php

namespace App\Entity;

use App\Repository\ChampionshipRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChampionshipRepository::class)
 */
class Championship
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity=Pilot::class, inversedBy="championships")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pilots;

    /**
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="championships")
     * @ORM\JoinColumn(nullable=false)
     */
    private $races;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getPilots(): ?Pilot
    {
        return $this->pilots;
    }

    public function setPilots(?Pilot $pilots): self
    {
        $this->pilots = $pilots;

        return $this;
    }

    public function getRaces(): ?Race
    {
        return $this->races;
    }

    public function setRaces(?Race $races): self
    {
        $this->races = $races;

        return $this;
    }
}
