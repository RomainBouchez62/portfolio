<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 */
class Experience
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
    private $nomExperience;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $entrepriseExperience;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptifExperience;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebutExperience;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateFinExperience;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="experiences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomExperience(): ?string
    {
        return $this->nomExperience;
    }

    public function setNomExperience(string $nomExperience): self
    {
        $this->nomExperience = $nomExperience;

        return $this;
    }

    public function getEntrepriseExperience(): ?string
    {
        return $this->entrepriseExperience;
    }

    public function setEntrepriseExperience(string $entrepriseExperience): self
    {
        $this->entrepriseExperience = $entrepriseExperience;

        return $this;
    }

    public function getDescriptifExperience(): ?string
    {
        return $this->descriptifExperience;
    }

    public function setDescriptifExperience(string $descriptifExperience): self
    {
        $this->descriptifExperience = $descriptifExperience;

        return $this;
    }

    public function getDateDebutExperience(): ?\DateTimeInterface
    {
        return $this->dateDebutExperience;
    }

    public function setDateDebutExperience(\DateTimeInterface $dateDebutExperience): self
    {
        $this->dateDebutExperience = $dateDebutExperience;

        return $this;
    }

    public function getDateFinExperience(): ?\DateTimeInterface
    {
        return $this->dateFinExperience;
    }

    public function setDateFinExperience(?\DateTimeInterface $dateFinExperience): self
    {
        $this->dateFinExperience = $dateFinExperience;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
