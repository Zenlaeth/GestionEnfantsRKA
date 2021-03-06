<?php

namespace App\Entity;

use App\Repository\ChequeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChequeRepository::class)
 */
class Cheque
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CHE_montant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CHE_montantLettres;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CHE_nomBeneficiaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CHE_lieu;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $CHE_date;

    /**
     * @ORM\OneToMany(targetEntity=Facturation::class, mappedBy="FAC_MoyenCHE", cascade={"persist", "remove"})
     */
    private $facturations;

    public function __construct()
    {
        $this->facturations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCHEMontant(): ?int
    {
        return $this->CHE_montant;
    }

    public function setCHEMontant(int $CHE_montant): self
    {
        $this->CHE_montant = $CHE_montant;

        return $this;
    }

    public function getCHEMontantLettres(): ?string
    {
        return $this->CHE_montantLettres;
    }

    public function setCHEMontantLettres(string $CHE_montantLettres): self
    {
        $this->CHE_montantLettres = $CHE_montantLettres;

        return $this;
    }

    public function getCHENomBeneficiaire(): ?string
    {
        return $this->CHE_nomBeneficiaire;
    }

    public function setCHENomBeneficiaire(string $CHE_nomBeneficiaire): self
    {
        $this->CHE_nomBeneficiaire = $CHE_nomBeneficiaire;

        return $this;
    }

    public function getCHELieu(): ?string
    {
        return $this->CHE_lieu;
    }

    public function setCHELieu(string $CHE_lieu): self
    {
        $this->CHE_lieu = $CHE_lieu;

        return $this;
    }

    public function getCHEDate(): ?\DateTimeInterface
    {
        return $this->CHE_date;
    }

    public function setCHEDate(\DateTimeInterface $CHE_date): self
    {
        $this->CHE_date = $CHE_date;

        return $this;
    }

    /**
     * @return Collection|Facturation[]
     */
    public function getFacturations(): Collection
    {
        return $this->facturations;
    }

    public function addFacturation(Facturation $facturation): self
    {
        if (!$this->facturations->contains($facturation)) {
            $this->facturations[] = $facturation;
            $facturation->setFACMoyenCHE($this);
        }

        return $this;
    }

    public function removeFacturation(Facturation $facturation): self
    {
        if ($this->facturations->removeElement($facturation)) {
            // set the owning side to null (unless already changed)
            if ($facturation->getFACMoyenCHE() === $this) {
                $facturation->setFACMoyenCHE(null);
            }
        }

        return $this;
    }
}
