<?php

namespace App\Entity;

use App\Repository\EspecesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EspecesRepository::class)
 */
class Especes
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
    private $ESP_montant;

    /**
     * @ORM\ManyToOne(targetEntity=MoyenPaiement::class, inversedBy="especes")
     */
    private $ESP_Moyen;

    /**
     * @ORM\OneToMany(targetEntity=Facturation::class, mappedBy="FAC_MoyenESP")
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

    public function getESPMontant(): ?int
    {
        return $this->ESP_montant;
    }

    public function setESPMontant(int $ESP_montant): self
    {
        $this->ESP_montant = $ESP_montant;

        return $this;
    }

    public function getESPMoyen(): ?MoyenPaiement
    {
        return $this->ESP_Moyen;
    }

    public function setESPMoyen(?MoyenPaiement $ESP_Moyen): self
    {
        $this->ESP_Moyen = $ESP_Moyen;

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
            $facturation->setFACMoyenESP($this);
        }

        return $this;
    }

    public function removeFacturation(Facturation $facturation): self
    {
        if ($this->facturations->removeElement($facturation)) {
            // set the owning side to null (unless already changed)
            if ($facturation->getFACMoyenESP() === $this) {
                $facturation->setFACMoyenESP(null);
            }
        }

        return $this;
    }
}
