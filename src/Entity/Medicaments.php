<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MedicamentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicamentsRepository::class)
 */
#[ApiResource]
class Medicaments
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
    private $libelle;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\OneToMany(targetEntity=Concerne::class, mappedBy="medicaments")
     */
    private $concernes;

    /**
     * @ORM\OneToMany(targetEntity=Englobe::class, mappedBy="medicaments")
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

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

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
            $concerne->setMedicaments($this);
        }

        return $this;
    }

    public function removeConcerne(Concerne $concerne): self
    {
        if ($this->concernes->removeElement($concerne)) {
            // set the owning side to null (unless already changed)
            if ($concerne->getMedicaments() === $this) {
                $concerne->setMedicaments(null);
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
            $englobe->setMedicaments($this);
        }

        return $this;
    }

    public function removeEnglobe(Englobe $englobe): self
    {
        if ($this->englobes->removeElement($englobe)) {
            // set the owning side to null (unless already changed)
            if ($englobe->getMedicaments() === $this) {
                $englobe->setMedicaments(null);
            }
        }

        return $this;
    }
}
