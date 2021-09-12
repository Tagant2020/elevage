<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PaiementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaiementRepository::class)
 */
#[ApiResource]
class Paiement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $somme;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $photoJustificatif;

    /**
     * @ORM\Column(type="integer")
     */
    private $coutEnvoi;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEnvoi;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="paiements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userP;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSomme(): ?int
    {
        return $this->somme;
    }

    public function setSomme(int $somme): self
    {
        $this->somme = $somme;

        return $this;
    }

    public function getPhotoJustificatif(): ?string
    {
        return $this->photoJustificatif;
    }

    public function setPhotoJustificatif(?string $photoJustificatif): self
    {
        $this->photoJustificatif = $photoJustificatif;

        return $this;
    }

    public function getCoutEnvoi(): ?int
    {
        return $this->coutEnvoi;
    }

    public function setCoutEnvoi(int $coutEnvoi): self
    {
        $this->coutEnvoi = $coutEnvoi;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    public function getUserP(): ?User
    {
        return $this->userP;
    }

    public function setUserP(?User $userP): self
    {
        $this->userP = $userP;

        return $this;
    }
}
