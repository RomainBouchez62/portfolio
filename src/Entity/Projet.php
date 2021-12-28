<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet
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
    private $nomProjet;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionProjet;

    /**
     * @ORM\Column(type="text")
     */
    private $lienProjet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slugProjet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProjet(): ?string
    {
        return $this->nomProjet;
    }

    public function setNomProjet(string $nomProjet): self
    {
        $this->nomProjet = $nomProjet;

        return $this;
    }

    public function getDescriptionProjet(): ?string
    {
        return $this->descriptionProjet;
    }

    public function setDescriptionProjet(string $descriptionProjet): self
    {
        $this->descriptionProjet = $descriptionProjet;

        return $this;
    }

    public function getLienProjet(): ?string
    {
        return $this->lienProjet;
    }

    public function setLienProjet(string $lienProjet): self
    {
        $this->lienProjet = $lienProjet;

        return $this;
    }

    public function getSlugProjet(): ?string
    {
        return $this->slugProjet;
    }

    public function setSlugProjet(string $slugProjet): self
    {
        $this->slugProjet = $slugProjet;

        return $this;
    }
}
