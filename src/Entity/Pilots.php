<?php

namespace App\Entity;

use App\Repository\PilotsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=PilotsRepository::class)
 */
class Pilots implements UserInterface, PasswordAuthenticatedUserInterface
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nationality;

    /**
     * @ORM\Column(type="integer")
     */
    private $furiousSkill;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $avatar;

    /**
     * @ORM\Column(type="integer")
     */
    private $wallet;

    /**
     * @ORM\OneToOne(targetEntity=Cars::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkIdCars;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $fkIdUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
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

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getFuriousSkill(): ?int
    {
        return $this->furiousSkill;
    }

    public function setFuriousSkill(int $furiousSkill): self
    {
        $this->furiousSkill = $furiousSkill;

        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getWallet(): ?int
    {
        return $this->wallet;
    }

    public function setWallet(int $wallet): self
    {
        $this->wallet = $wallet;

        return $this;
    }

    public function getFkIdCars(): ?int
    {
        return $this->fkIdCars;
    }

    public function setFkIdCars(int $fkIdCars): self
    {
        $this->fkIdCars = $fkIdCars;

        return $this;
    }

    public function getFkIdUser(): ?Users
    {
        return $this->fkIdUser;
    }

    public function setFkIdUser(Users $fkIdUser): self
    {
        $this->fkIdUser = $fkIdUser;

        return $this;
    }
}
