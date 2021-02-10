<?php

namespace App\Entity;

use App\Entity\Facturation;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MoyenPaiementRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=MoyenPaiementRepository::class)
 */
class MoyenPaiement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Facturation::class, mappedBy="Moyen_Facturation")
     */
    private $Moyen_Facturation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Moyen_Libelle;

    /**
     * @ORM\OneToMany(targetEntity=CarteBancaire::class, mappedBy="CARD_Moyen")
     */
    private $carteBancaires;

    /**
     * @ORM\OneToMany(targetEntity=Cheque::class, mappedBy="CHE_moyen")
     */
    private $cheques;

    /**
     * @ORM\OneToMany(targetEntity=ChequeVacances::class, mappedBy="CHE_Moyen")
     */
    private $chequeVacances;

    /**
     * @ORM\OneToMany(targetEntity=Especes::class, mappedBy="ESP_Moyen")
     */
    private $especes;

    public function __construct()
    {
        $this->Moyen_Facturation = new ArrayCollection();
        $this->carteBancaires = new ArrayCollection();
        $this->cheques = new ArrayCollection();
        $this->chequeVacances = new ArrayCollection();
        $this->especes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id; 
    }

    /**
     * @return Collection|Facturation[]
     */
    public function getFACMoyenPaiements(): Collection
    {
        return $this->Moyen_Facturation;
    }

    public function addFACMoyenPaiement(Facturation $facturation): self
    {
        if (!$this->Moyen_Facturation->contains($facturation)) {
            $this->Moyen_Facturation[] = $facturation;
            $facturation->setFACMoyenPaiement($this);
        }

        return $this;
    }

    public function removeFACMoyenPaiement(Facturation $facturation): self
    {
        if ($this->Moyen_Facturation->removeElement($facturation)) {
            // set the owning side to null (unless already changed)
            if ($facturation->getFACMoyenPaiement() === $this) {
                $facturation->setFACMoyenPaiement(null);
            }
        }

        return $this;
    }

    public function getMoyenLibelle(): ?string
    {
        return $this->Moyen_Libelle;
    }

    public function setMoyenLibelle(string $Moyen_Libelle): self
    {
        $this->Moyen_Libelle = $Moyen_Libelle;

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
            $carteBancaire->setCARDMoyen($this);
        }

        return $this;
    }

    public function removeCarteBancaire(CarteBancaire $carteBancaire): self
    {
        if ($this->carteBancaires->removeElement($carteBancaire)) {
            // set the owning side to null (unless already changed)
            if ($carteBancaire->getCARDMoyen() === $this) {
                $carteBancaire->setCARDMoyen(null);
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
            $cheque->setCHEMoyen($this);
        }

        return $this;
    }

    public function removeCheque(Cheque $cheque): self
    {
        if ($this->cheques->removeElement($cheque)) {
            // set the owning side to null (unless already changed)
            if ($cheque->getCHEMoyen() === $this) {
                $cheque->setCHEMoyen(null);
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
            $chequeVacance->setCHEMoyen($this);
        }

        return $this;
    }

    public function removeChequeVacance(ChequeVacances $chequeVacance): self
    {
        if ($this->chequeVacances->removeElement($chequeVacance)) {
            // set the owning side to null (unless already changed)
            if ($chequeVacance->getCHEMoyen() === $this) {
                $chequeVacance->setCHEMoyen(null);
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
            $espece->setESPMoyen($this);
        }

        return $this;
    }

    public function removeEspece(Especes $espece): self
    {
        if ($this->especes->removeElement($espece)) {
            // set the owning side to null (unless already changed)
            if ($espece->getESPMoyen() === $this) {
                $espece->setESPMoyen(null);
            }
        }

        return $this;
    }
}
