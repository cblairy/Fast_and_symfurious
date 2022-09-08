<?php

namespace App\Entity;

use App\Repository\ParticipationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticipationRepository::class)
 */
class Participation
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
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="participations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $races;

    /**
     * @ORM\OneToOne(targetEntity=Pilot::class, inversedBy="participation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $pilots;

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

    public function getRaces(): ?Race
    {
        return $this->races;
    }

    public function setRaces(?Race $races): self
    {
        $this->races = $races;

        return $this;
    }

    public function getPilots(): ?Pilot
    {
        return $this->pilots;
    }

    public function setPilots(Pilot $pilots): self
    {
        $this->pilots = $pilots;

        return $this;
    }
}
