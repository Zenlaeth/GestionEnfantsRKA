<?php

namespace App\Entity;

use App\Repository\EspecesRepository;
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
     * @ORM\ManyToOne(targetEntity=Facturation::class, inversedBy="especes")
     */
    private $ESP_Facturation;

    /**
     * @ORM\ManyToOne(targetEntity=MoyenPaiement::class, inversedBy="especes")
     */
    private $ESP_Moyen;

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

    public function getESPFacturation(): ?Facturation
    {
        return $this->ESP_Facturation;
    }

    public function setESPFacturation(?Facturation $ESP_Facturation): self
    {
        $this->ESP_Facturation = $ESP_Facturation;

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
}
