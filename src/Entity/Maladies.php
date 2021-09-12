<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MaladiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaladiesRepository::class)
 */
#[ApiResource]
class Maladies
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
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $symptomes;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\OneToMany(targetEntity=Concerne::class, mappedBy="maladie")
     */
    private $concernes;

    /**
     * @ORM\OneToMany(targetEntity=Englobe::class, mappedBy="maladie")
     */
    private $englobes;

    public function __construct()
    {
        $this->concernes = new ArrayCollection();
        $this->englobes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSymptomes(): ?string
    {
        return $this->symptomes;
    }

    public function setSymptomes(string $symptomes): self
    {
        $this->symptomes = $symptomes;

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

    /**
     * @return Collection|Concerne[]
     */
    public function getConcernes(): Collection
    {
        return $this->concernes;
    }

    public function addConcerne(Concerne $concerne): self
    {
        if (!$this->concernes->contains($concerne)) {
            $this->concernes[] = $concerne;
            $concerne->setMaladie($this);
        }

        return $this;
    }

    public function removeConcerne(Concerne $concerne): self
    {
        if ($this->concernes->removeElement($concerne)) {
            // set the owning side to null (unless already changed)
            if ($concerne->getMaladie() === $this) {
                $concerne->setMaladie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Englobe[]
     */
    public function getEnglobes(): Collection
    {
        return $this->englobes;
    }

    public function addEnglobe(Englobe $englobe): self
    {
        if (!$this->englobes->contains($englobe)) {
            $this->englobes[] = $englobe;
            $englobe->setMaladie($this);
        }

        return $this;
    }

    public function removeEnglobe(Englobe $englobe): self
    {
        if ($this->englobes->removeElement($englobe)) {
            // set the owning side to null (unless already changed)
            if ($englobe->getMaladie() === $this) {
                $englobe->setMaladie(null);
            }
        }

        return $this;
    }
}
