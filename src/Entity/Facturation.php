<?php

namespace App\Entity;

use App\Entity\Tarif;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FacturationRepository;

/**
 * @ORM\Entity(repositoryClass=FacturationRepository::class)
 */
class Facturation
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
    private $FAC_code;

    /**
     * @ORM\ManyToOne(targetEntity=Enfant::class, inversedBy="facturations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $FACEnfant;

    /**
     * @ORM\ManyToOne(targetEntity=MoyenPaiement::class, inversedBy="moyenPaiements")
     */
    private $FAC_MoyenPaiement;

    /**
     * @ORM\ManyToOne(targetEntity=Tarif::class, inversedBy="tarifs")
     */
    private $FAC_Tarif;

    /**
     * @ORM\Column(type="integer")
     */
    private $FAC_optionPaiement;

    /**
     * @ORM\ManyToOne(targetEntity=Statut::class, inversedBy="statuts")
     */
    private $FAC_Statut;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="facturations")
     */
    private $FAC_auteur;

    /**
     * @ORM\ManyToOne(targetEntity=CarteBancaire::class, inversedBy="facturations")
     */
    private $FAC_MoyenCB;

    /**
     * @ORM\ManyToOne(targetEntity=Cheque::class, inversedBy="facturations")
     */
    private $FAC_MoyenCHE;

    /**
     * @ORM\ManyToOne(targetEntity=ChequeVacances::class, inversedBy="facturations")
     */
    private $FAC_MoyenCHEV;

    /**
     * @ORM\ManyToOne(targetEntity=Especes::class, inversedBy="facturations")
     */
    private $FAC_MoyenESP;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFACCode(): ?int
    {
        return $this->FAC_code;
    }

    public function setFACCode(int $FAC_code): self
    {
        $this->FAC_code = $FAC_code;

        return $this;
    }

    public function getFACEnfant(): ?Enfant
    {
        return $this->FACEnfant;
    }

    public function setFACEnfant(?Enfant $FACEnfant): self
    {
        $this->FACEnfant = $FACEnfant;

        return $this;
    }

    public function getFACOptionPaiement(): ?int
    {
        return $this->FAC_optionPaiement;
    }

    public function setFACOptionPaiement(int $FAC_optionPaiement): self
    {
        $this->FAC_optionPaiement = $FAC_optionPaiement;

        return $this;
    }

    public function getFACMoyenPaiement(): ?MoyenPaiement
    {
        return $this->FAC_MoyenPaiement;
    }

    public function setFACMoyenPaiement(?MoyenPaiement $Moyen_Facturation): self
    {
        $this->FAC_MoyenPaiement = $Moyen_Facturation;

        return $this;
    }

    public function getFACTarif(): ?Tarif
    {
        return $this->FAC_Tarif;
    }

    public function setFACTarif(?Tarif $Tarif_Facturation): self
    {
        $this->FAC_Tarif = $Tarif_Facturation;

        return $this;
    }

    public function getFACStatut(): ?Statut
    {
        return $this->FAC_Statut;
    }

    public function setFACStatut(?Statut $Statut_Facturation): self
    {
        $this->FAC_Statut = $Statut_Facturation;

        return $this;
    }

    public function getFACAuteur(): ?User
    {
        return $this->FAC_auteur;
    }

    public function setFACAuteur(?User $FAC_auteur): self
    {
        $this->FAC_auteur = $FAC_auteur;

        return $this;
    }

    public function getFACMoyenCB(): ?CarteBancaire
    {
        return $this->FAC_MoyenCB;
    }

    public function setFACMoyenCB(?CarteBancaire $FAC_MoyenCB): self
    {
        $this->FAC_MoyenCB = $FAC_MoyenCB;

        return $this;
    }

    public function getFACMoyenCHE(): ?Cheque
    {
        return $this->FAC_MoyenCHE;
    }

    public function setFACMoyenCHE(?Cheque $FAC_MoyenCHE): self
    {
        $this->FAC_MoyenCHE = $FAC_MoyenCHE;

        return $this;
    }

    public function getFACMoyenCHEV(): ?ChequeVacances
    {
        return $this->FAC_MoyenCHEV;
    }

    public function setFACMoyenCHEV(?ChequeVacances $FAC_MoyenCHEV): self
    {
        $this->FAC_MoyenCHEV = $FAC_MoyenCHEV;

        return $this;
    }

    public function getFACMoyenESP(): ?Especes
    {
        return $this->FAC_MoyenESP;
    }

    public function setFACMoyenESP(?Especes $FAC_MoyenESP): self
    {
        $this->FAC_MoyenESP = $FAC_MoyenESP;

        return $this;
    }
}
