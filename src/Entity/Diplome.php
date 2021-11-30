<?php

namespace App\Entity;

use App\Repository\DiplomeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiplomeRepository::class)
 */
class Diplome
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
    private $nomDiplome;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptifDiplome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ecoleDiplome;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateObtentionDiplome;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="diplomes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDiplome(): ?string
    {
        return $this->nomDiplome;
    }

    public function setNomDiplome(string $nomDiplome): self
    {
        $this->nomDiplome = $nomDiplome;

        return $this;
    }

    public function getDescriptifDiplome(): ?string
    {
        return $this->descriptifDiplome;
    }

    public function setDescriptifDiplome(string $descriptifDiplome): self
    {
        $this->descriptifDiplome = $descriptifDiplome;

        return $this;
    }

    public function getEcoleDiplome(): ?string
    {
        return $this->ecoleDiplome;
    }

    public function setEcoleDiplome(string $ecoleDiplome): self
    {
        $this->ecoleDiplome = $ecoleDiplome;

        return $this;
    }

    public function getDateObtentionDiplome(): ?\DateTimeInterface
    {
        return $this->dateObtentionDiplome;
    }

    public function setDateObtentionDiplome(\DateTimeInterface $dateObtentionDiplome): self
    {
        $this->dateObtentionDiplome = $dateObtentionDiplome;

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
