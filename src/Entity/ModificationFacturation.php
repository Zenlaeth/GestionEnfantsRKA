<?php

namespace App\Entity;

use App\Entity\Tarif;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ModificationFacturationRepository;

/**
 * @ORM\Entity(repositoryClass=ModificationFacturationRepository::class)
 */
class ModificationFacturation
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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="modificationFacturations")
     */
    private $MODIF_auteur;
    

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

    public function getMODIFAuteur(): ?User
    {
        return $this->MODIF_auteur;
    }

    public function setMODIFAuteur(?User $MODIF_auteur): self
    {
        $this->MODIF_auteur = $MODIF_auteur;

        return $this;
    }
}
