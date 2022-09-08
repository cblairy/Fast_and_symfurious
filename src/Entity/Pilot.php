<?php

namespace App\Entity;

use App\Repository\PilotRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=PilotRepository::class)
 */
class Pilot implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nationality;

    /**
     * @ORM\Column(type="integer")
     */
    private $drivingSkills;

    /**
     * @ORM\Column(type="integer")
     */
    private $photogenicSkills;

    /**
     * @ORM\OneToOne(targetEntity=Participation::class, mappedBy="pilots", cascade={"persist", "remove"})
     */
    private $participation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $wallet;

    /**
     * @ORM\OneToOne(targetEntity=Car::class, inversedBy="pilot", cascade={"persist", "remove"})
     */
    private $fkCar;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getDrivingSkills(): ?int
    {
        return $this->drivingSkills;
    }

    public function setDrivingSkills(int $drivingSkills): self
    {
        $this->drivingSkills = $drivingSkills;

        return $this;
    }

    public function getPhotogenicSkills(): ?int
    {
        return $this->photogenicSkills;
    }

    public function setPhotogenicSkills(int $photogenicSkills): self
    {
        $this->photogenicSkills = $photogenicSkills;

        return $this;
    }

    public function getParticipation(): ?Participation
    {
        return $this->participation;
    }

    public function setParticipation(Participation $participation): self
    {
        // set the owning side of the relation if necessary
        if ($participation->getPilots() !== $this) {
            $participation->setPilots($this);
        }

        $this->participation = $participation;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getWallet(): ?int
    {
        return $this->wallet;
    }

    public function setWallet(?int $wallet): self
    {
        $this->wallet = $wallet;

        return $this;
    }

    public function getFkCar(): ?Car
    {
        return $this->fkCar;
    }

    public function setFkCar(?Car $fkCar): self
    {
        $this->fkCar = $fkCar;

        return $this;
    }
}
