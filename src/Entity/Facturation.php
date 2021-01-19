<?php

namespace App\Entity;

use App\Repository\FacturationRepository;
use Doctrine\ORM\Mapping as ORM;

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
    private $FAC_enfant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FAC_moyenPaiement;

    /**
     * @ORM\Column(type="float")
     */
    private $FAC_tarif;

    /**
     * @ORM\Column(type="integer")
     */
    private $FAC_optionPaiement;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $FAC_total;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $FAC_statut;
    

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
        return $this->FAC_enfant;
    }

    public function setFACEnfant(?Enfant $FAC_enfant): self
    {
        $this->FAC_enfant = $FAC_enfant;

        return $this;
    }

    public function getFACMoyenPaiement(): ?string
    {
        return $this->FAC_moyenPaiement;
    }

    public function setFACMoyenPaiement(string $FAC_moyenPaiement): self
    {
        $this->FAC_moyenPaiement = $FAC_moyenPaiement;

        return $this;
    }

    public function getFACTarif(): ?float
    {
        return $this->FAC_tarif;
    }

    public function setFACTarif(float $FAC_tarif): self
    {
        $this->FAC_tarif = $FAC_tarif;

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

    public function getFACTotal(): ?float
    {
        return $this->FAC_total;
    }

    public function setFACTotal(float $FAC_tarif, float $FAC_optionPaiement): self
    {
        $this->FAC_total = $FAC_tarif / $FAC_optionPaiement;

        return $this;
    }

    public function getFACStatut(): ?string
    {
        return $this->FAC_statut;
    }

    public function setFACStatut(?string $FAC_statut): self
    {
        $this->FAC_statut = $FAC_statut;

        return $this;
    }
}