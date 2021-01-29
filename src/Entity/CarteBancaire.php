<?php

namespace App\Entity;

use App\Repository\CarteBancaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarteBancaireRepository::class)
 */
class CarteBancaire
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
    private $CARD_num;

    /**
     * @ORM\Column(type="date")
     */
    private $CARD_dateExp;

    /**
     * @ORM\Column(type="integer")
     */
    private $CARD_crypto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CARD_nom;

    /**
     * @ORM\ManyToOne(targetEntity=MoyenPaiement::class, inversedBy="carteBancaires")
     */
    private $CARD_Moyen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCARDNum(): ?string
    {
        return $this->CARD_num;
    }

    public function setCARDNum(string $CARD_num): self
    {
        $this->CARD_num = $CARD_num;

        return $this;
    }

    public function getCARDDateExp(): ?\DateTimeInterface
    {
        return $this->CARD_dateExp;
    }

    public function setCARDDateExp(\DateTimeInterface $CARD_dateExp): self
    {
        $this->CARD_dateExp = $CARD_dateExp;

        return $this;
    }

    public function getCARDCrypto(): ?int
    {
        return $this->CARD_crypto;
    }

    public function setCARDCrypto(int $CARD_crypto): self
    {
        $this->CARD_crypto = $CARD_crypto;

        return $this;
    }

    public function getCARDNom(): ?string
    {
        return $this->CARD_nom;
    }

    public function setCARDNom(string $CARD_nom): self
    {
        $this->CARD_nom = $CARD_nom;

        return $this;
    }

    public function getCARDMoyen(): ?MoyenPaiement
    {
        return $this->CARD_Moyen;
    }

    public function setCARDMoyen(?MoyenPaiement $CARD_Moyen): self
    {
        $this->CARD_Moyen = $CARD_Moyen;

        return $this;
    }
}
