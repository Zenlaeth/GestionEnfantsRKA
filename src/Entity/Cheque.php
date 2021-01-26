<?php

namespace App\Entity;

use App\Repository\ChequeRepository;
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
     * @ORM\Column(type="integer")
     */
    private $CHE_montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CHE_montantLettres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CHE_nomBeneficiaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CHE_lieu;

    /**
     * @ORM\Column(type="date")
     */
    private $CHE_date;

    /**
     * @ORM\ManyToOne(targetEntity=MoyenPaiement::class, inversedBy="cheques")
     */
    private $CHE_moyen;

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

    public function getCHEMoyen(): ?MoyenPaiement
    {
        return $this->CHE_moyen;
    }

    public function setCHEMoyen(?MoyenPaiement $CHE_moyen): self
    {
        $this->CHE_moyen = $CHE_moyen;

        return $this;
    }
}
