<?php

namespace App\Entity;

use App\Repository\MaterielRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaterielRepository::class)
 */
class Materiel
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
    private $MAT_ref;

    /**
     * @ORM\Column(type="integer")
     */
    private $MAT_quantite;

    /**
     * @ORM\Column(type="integer")
     */
    private $MAT_quantiteSortie;

    /**
     * @ORM\Column(type="integer")
     */
    private $MAT_quantiteTotal;

    /**
     * @ORM\Column(type="integer")
     */
    private $MAT_quantitePerdu;

    /**
     * @ORM\Column(type="integer")
     */
    private $MAT_quantiteVendu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMATRef(): ?string
    {
        return $this->MAT_ref;
    }

    public function setMATRef(string $MAT_ref): self
    {
        $this->MAT_ref = $MAT_ref;

        return $this;
    }

    public function getMATQuantite(): ?int
    {
        return $this->MAT_quantite;
    }

    public function setMATQuantite(int $MAT_quantite): self
    {
        $this->MAT_quantite = $MAT_quantite;

        return $this;
    }

    public function getMATQuantiteSortie(): ?int
    {
        return $this->MAT_quantiteSortie;
    }

    public function setMATQuantiteSortie(int $MAT_quantiteSortie): self
    {
        $this->MAT_quantiteSortie = $MAT_quantiteSortie;

        return $this;
    }

    public function getMATQuantiteTotal(): ?int
    {
        return $this->MAT_quantiteTotal;
    }

    public function setMATQuantiteTotal(int $MAT_quantiteTotal): self
    {
        $this->MAT_quantiteTotal = $MAT_quantiteTotal;

        return $this;
    }

    public function getMATQuantitePerdu(): ?int
    {
        return $this->MAT_quantitePerdu;
    }

    public function setMATQuantitePerdu(int $MAT_quantitePerdu): self
    {
        $this->MAT_quantitePerdu = $MAT_quantitePerdu;

        return $this;
    }

    public function getMATQuantiteVendu(): ?int
    {
        return $this->MAT_quantiteVendu;
    }

    public function setMATQuantiteVendu(int $MAT_quantiteVendu): self
    {
        $this->MAT_quantiteVendu = $MAT_quantiteVendu;

        return $this;
    }
}
