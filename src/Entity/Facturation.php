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
     * @ORM\OneToMany(targetEntity=CarteBancaire::class, mappedBy="CARD_facturation")
     */
    private $carteBancaires;

    /**
     * @ORM\OneToMany(targetEntity=Cheque::class, mappedBy="CHE_Facturation")
     */
    private $cheques;

    /**
     * @ORM\OneToMany(targetEntity=ChequeVacances::class, mappedBy="CHEV_Facturation")
     */
    private $chequeVacances;

    /**
     * @ORM\OneToMany(targetEntity=Especes::class, mappedBy="ESP_Facturation")
     */
    private $especes;

    public function __construct()
    {
        $this->carteBancaires = new ArrayCollection();
        $this->cheques = new ArrayCollection();
        $this->chequeVacances = new ArrayCollection();
        $this->especes = new ArrayCollection();
    }
    

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

    /**
     * @return Collection|CarteBancaire[]
     */
    public function getCarteBancaires(): Collection
    {
        return $this->carteBancaires;
    }

    public function addCarteBancaire(CarteBancaire $carteBancaire): self
    {
        if (!$this->carteBancaires->contains($carteBancaire)) {
            $this->carteBancaires[] = $carteBancaire;
            $carteBancaire->setCARDFacturation($this);
        }

        return $this;
    }

    public function removeCarteBancaire(CarteBancaire $carteBancaire): self
    {
        if ($this->carteBancaires->removeElement($carteBancaire)) {
            // set the owning side to null (unless already changed)
            if ($carteBancaire->getCARDFacturation() === $this) {
                $carteBancaire->setCARDFacturation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cheque[]
     */
    public function getCheques(): Collection
    {
        return $this->cheques;
    }

    public function addCheque(Cheque $cheque): self
    {
        if (!$this->cheques->contains($cheque)) {
            $this->cheques[] = $cheque;
            $cheque->setCHEFacturation($this);
        }

        return $this;
    }

    public function removeCheque(Cheque $cheque): self
    {
        if ($this->cheques->removeElement($cheque)) {
            // set the owning side to null (unless already changed)
            if ($cheque->getCHEFacturation() === $this) {
                $cheque->setCHEFacturation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ChequeVacances[]
     */
    public function getChequeVacances(): Collection
    {
        return $this->chequeVacances;
    }

    public function addChequeVacance(ChequeVacances $chequeVacance): self
    {
        if (!$this->chequeVacances->contains($chequeVacance)) {
            $this->chequeVacances[] = $chequeVacance;
            $chequeVacance->setCHEVFacturation($this);
        }

        return $this;
    }

    public function removeChequeVacance(ChequeVacances $chequeVacance): self
    {
        if ($this->chequeVacances->removeElement($chequeVacance)) {
            // set the owning side to null (unless already changed)
            if ($chequeVacance->getCHEVFacturation() === $this) {
                $chequeVacance->setCHEVFacturation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Especes[]
     */
    public function getEspeces(): Collection
    {
        return $this->especes;
    }

    public function addEspece(Especes $espece): self
    {
        if (!$this->especes->contains($espece)) {
            $this->especes[] = $espece;
            $espece->setESPFacturation($this);
        }

        return $this;
    }

    public function removeEspece(Especes $espece): self
    {
        if ($this->especes->removeElement($espece)) {
            // set the owning side to null (unless already changed)
            if ($espece->getESPFacturation() === $this) {
                $espece->setESPFacturation(null);
            }
        }

        return $this;
    }


}
