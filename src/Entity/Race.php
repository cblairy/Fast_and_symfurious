<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaceRepository::class)
 */
class Race
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
     * @ORM\Column(type="json", nullable=true)
     */
    private $startGrid = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $endGrid = [];

    /**
     * @ORM\OneToMany(targetEntity=Participation::class, mappedBy="races")
     */
    private $participations;

    /**
     * @ORM\ManyToOne(targetEntity=Tournament::class, inversedBy="races")
     */
    private $tournament;

    public function __construct()
    {
        $this->participations = new ArrayCollection();
    }

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

    public function setStartGrid(?array $startGrid): self
    {
        $this->startGrid = $startGrid;

        return $this;
    }

    public function getEndGrid(): ?array
    {
        return $this->endGrid;
    }

    public function setEndGrid(?array $endGrid): self
    {
        $this->endGrid = $endGrid;

        return $this;
    }

    /**
     * @return Collection<int, Participation>
     */
    public function getParticipations(): Collection
    {
        return $this->participations;
    }

    public function addParticipation(Participation $participation): self
    {
        if (!$this->participations->contains($participation)) {
            $this->participations[] = $participation;
            $participation->setRaces($this);
        }

        return $this;
    }

    public function removeParticipation(Participation $participation): self
    {
        if ($this->participations->removeElement($participation)) {
            // set the owning side to null (unless already changed)
            if ($participation->getRaces() === $this) {
                $participation->setRaces(null);
            }
        }

        return $this;
    }

    public function getTournament(): ?Tournament
    {
        return $this->tournament;
    }

    public function setTournament(?Tournament $tournament): self
    {
        $this->tournament = $tournament;

        return $this;
    }
}
