<?php

namespace App\Entity;

use App\Repository\ChequeVacancesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChequeVacancesRepository::class)
 */
class ChequeVacances
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CHEV_montant;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $CHEV_validite;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $CHEV_anneeEmission;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CHEV_nomTitulaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CHEV_adresseTitulaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CHEV_nomEmployeur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $CHEV_adresseEmployeur;

    /**
     * @ORM\OneToMany(targetEntity=Facturation::class, mappedBy="FAC_MoyenCHEV", cascade={"persist", "remove"})
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

    public function getCHEVMontant(): ?int
    {
        return $this->CHEV_montant;
    }

    public function setCHEVMontant(int $CHEV_montant): self
    {
        $this->CHEV_montant = $CHEV_montant;

        return $this;
    }

    public function getCHEVValidite(): ?\DateTimeInterface
    {
        return $this->CHEV_validite;
    }

    public function setCHEVValidite(\DateTimeInterface $CHEV_validite): self
    {
        $this->CHEV_validite = $CHEV_validite;

        return $this;
    }

    public function getCHEVAnneeEmission(): ?\DateTimeInterface
    {
        return $this->CHEV_anneeEmission;
    }

    public function setCHEVAnneeEmission(\DateTimeInterface $CHEV_anneeEmission): self
    {
        $this->CHEV_anneeEmission = $CHEV_anneeEmission;

        return $this;
    }

    public function getCHEVNomTitulaire(): ?string
    {
        return $this->CHEV_nomTitulaire;
    }

    public function setCHEVNomTitulaire(string $CHEV_nomTitulaire): self
    {
        $this->CHEV_nomTitulaire = $CHEV_nomTitulaire;

        return $this;
    }

    public function getCHEVAdresseTitulaire(): ?string
    {
        return $this->CHEV_adresseTitulaire;
    }

    public function setCHEVAdresseTitulaire(string $CHEV_adresseTitulaire): self
    {
        $this->CHEV_adresseTitulaire = $CHEV_adresseTitulaire;

        return $this;
    }

    public function getCHEVNomEmployeur(): ?string
    {
        return $this->CHEV_nomEmployeur;
    }

    public function setCHEVNomEmployeur(string $CHEV_nomEmployeur): self
    {
        $this->CHEV_nomEmployeur = $CHEV_nomEmployeur;

        return $this;
    }

    public function getCHEVAdresseEmployeur(): ?string
    {
        return $this->CHEV_adresseEmployeur;
    }

    public function setCHEVAdresseEmployeur(string $CHEV_adresseEmployeur): self
    {
        $this->CHEV_adresseEmployeur = $CHEV_adresseEmployeur;

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
            $facturation->setFACMoyenCHEV($this);
        }

        return $this;
    }

    public function removeFacturation(Facturation $facturation): self
    {
        if ($this->facturations->removeElement($facturation)) {
            // set the owning side to null (unless already changed)
            if ($facturation->getFACMoyenCHEV() === $this) {
                $facturation->setFACMoyenCHEV(null);
            }
        }

        return $this;
    }
}
