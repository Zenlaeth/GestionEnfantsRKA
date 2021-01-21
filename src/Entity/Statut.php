<?php

namespace App\Entity;

use App\Repository\StatutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatutRepository::class)
 */
class Statut
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Statut_Libelle;

    /**
     * @ORM\OneToMany(targetEntity=Facturation::class, mappedBy="Statut_Facturation")
     */
    private $Statut_Facturation;

    public function __construct()
    {
        $this->Statut_Facturation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatutLibelle(): ?string
    {
        return $this->Statut_Libelle;
    }

    public function setStatutLibelle(string $Statut_Libelle): self
    {
        $this->Statut_Libelle = $Statut_Libelle;

        return $this;
    }

    /**
     * @return Collection|Facturation[]
     */
    public function getStatuts(): Collection
    {
        return $this->Statut_Facturation;
    }

    public function addStatut(Facturation $Statut_Facturation): self
    {
        if (!$this->Statut_Facturation->contains($Statut_Facturation)) {
            $this->Statut_Facturation[] = $Statut_Facturation;
            $Statut_Facturation->setFACStatut($this);
        }

        return $this;
    }

    public function removeStatut(Facturation $Statut_Facturation): self
    {
        if ($this->Statut_Facturation->removeElement($Statut_Facturation)) {
            // set the owning side to null (unless already changed)
            if ($Statut_Facturation->getFACStatut() === $this) {
                $Statut_Facturation->setFACStatut(null);
            }
        }

        return $this;
    }
}
