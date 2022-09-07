<?php

namespace App\Entity;

use App\Repository\ChampionshipRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToMany(targetEntity=Pilots::class)
     */
    private $fkPilot;

    /**
     * @ORM\ManyToOne(targetEntity=Races::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkRaces;

    public function __construct()
    {
        $this->fkPilot = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Pilots>
     */
    public function getFkPilot(): Collection
    {
        return $this->fkPilot;
    }

    public function addFkPilot(Pilots $fkPilot): self
    {
        if (!$this->fkPilot->contains($fkPilot)) {
            $this->fkPilot[] = $fkPilot;
        }

        return $this;
    }

    public function removeFkPilot(Pilots $fkPilot): self
    {
        $this->fkPilot->removeElement($fkPilot);

        return $this;
    }

    public function getFkRaces(): ?Races
    {
        return $this->fkRaces;
    }

    public function setFkRaces(?Races $fkRaces): self
    {
        $this->fkRaces = $fkRaces;

        return $this;
    }
}
