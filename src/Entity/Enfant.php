<?php

namespace App\Entity;

use App\Entity\EnfantRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnfantRepository")
 */
class Enfant
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
    private $ENF_nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ENF_prenom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\LessThanOrEqual(value = 5, message="Votre note doit être inférieure ou égale à 5 !")
     */
    private $ENF_note;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ENF_description;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="enfants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ENF_auteur;

    public function getENFFullName() {        
        return "{$this->ENF_nom} {$this->ENF_prenom}";
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getENFNom(): ?string
    {
        return $this->ENF_nom;
    }

    public function setENFNom(string $ENF_nom): self
    {
        $this->ENF_nom = $ENF_nom;

        return $this;
    }

    public function getENFPrenom(): ?string
    {
        return $this->ENF_prenom;
    }

    public function setENFPrenom(string $ENF_prenom): self
    {
        $this->ENF_prenom = $ENF_prenom;

        return $this;
    }

    public function getENFNote(): ?int
    {
        return $this->ENF_note;
    }

    public function setENFNote(?int $ENF_note): self
    {
        $this->ENF_note = $ENF_note;

        return $this;
    }

    public function getENFDescription(): ?string
    {
        return $this->ENF_description;
    }

    public function setENFDescription(?string $ENF_description): self
    {
        $this->ENF_description = $ENF_description;

        return $this;
    }

    public function getENFAuteur(): ?User
    {
        return $this->ENF_auteur;
    }

    public function setENFAuteur(?User $ENF_auteur): self
    {
        $this->ENF_auteur = $ENF_auteur;

        return $this;
    }
}
