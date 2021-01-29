<?php

namespace App\Entity;

use App\Repository\TarifRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TarifRepository::class)
 */
class Tarif
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $Tarif_Montant;

    /**
     * @ORM\OneToMany(targetEntity=Facturation::class, mappedBy="FAC_Tarif")
     */
    private $Tarif_Facturation;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Tarif_Libelle;

    public function __construct()
    {
        $this->Tarif_Facturation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarifMontant(): ?float
    {
        return $this->Tarif_Montant;
    }

    public function setTarifMontant(float $Tarif_Montant): self
    {
        $this->Tarif_Montant = $Tarif_Montant;

        return $this;
    }

    public function getTarifLibelle(): ?string
    {
        return $this->Tarif_Libelle;
    }

    public function setTarifLibelle(string $Tarif_Libelle): self
    {
        $this->Tarif_Libelle = $Tarif_Libelle;

        return $this;
    }

    /**
     * @return Collection|Facturation[]
     */
    public function getTarifFacturation(): Collection
    {
        return $this->Tarif_Facturation;
    }

    public function addTarifFacturation(Facturation $facturation): self
    {
        if (!$this->Tarif_Facturation->contains($facturation)) {
            $this->Tarif_Facturation[] = $facturation;
            $facturation->setFACTarif($this);
        }

        return $this;
    }

    public function removeTarifFacturation(Facturation $facturation): self
    {
        if ($this->Tarif_Facturation->removeElement($facturation)) {
            // set the owning side to null (unless already changed)
            if ($facturation->getFACTarif() === $this) {
                $facturation->setFACTarif(null);
            }
        }

        return $this;
    }
}
