<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ConcerneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcerneRepository::class)
 */
#[ApiResource]
class Concerne
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Maladies::class, inversedBy="concernes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $maladie;

    /**
     * @ORM\ManyToOne(targetEntity=Medicaments::class, inversedBy="concernes")
     */
    private $medicaments;

    /**
     * @ORM\ManyToOne(targetEntity=Profil::class, inversedBy="concernes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $profil;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaladie(): ?Maladies
    {
        return $this->maladie;
    }

    public function setMaladie(?Maladies $maladie): self
    {
        $this->maladie = $maladie;

        return $this;
    }

    public function getMedicaments(): ?Medicaments
    {
        return $this->medicaments;
    }

    public function setMedicaments(?Medicaments $medicaments): self
    {
        $this->medicaments = $medicaments;

        return $this;
    }

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(?Profil $profil): self
    {
        $this->profil = $profil;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
