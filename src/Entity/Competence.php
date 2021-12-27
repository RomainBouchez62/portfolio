<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 */
class Competence
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
    private $nomCompetence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveauCompetence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fileCompetence;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCompetence(): ?string
    {
        return $this->nomCompetence;
    }

    public function setNomCompetence(string $nomCompetence): self
    {
        $this->nomCompetence = $nomCompetence;

        return $this;
    }

    public function getNiveauCompetence(): ?string
    {
        return $this->niveauCompetence;
    }

    public function setNiveauCompetence(string $niveauCompetence): self
    {
        $this->niveauCompetence = $niveauCompetence;

        return $this;
    }

    public function getFileCompetence(): ?string
    {
        return $this->fileCompetence;
    }

    public function setFileCompetence(string $fileCompetence): self
    {
        $this->fileCompetence = $fileCompetence;

        return $this;
    }
}
