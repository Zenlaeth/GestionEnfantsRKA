<?php

namespace App\Entity;

use App\Repository\RepresentantLegalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RepresentantLegalRepository::class)
 */
class RepresentantLegal
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
    private $REPR_nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $REPR_prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $REPR_adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $REPR_tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $REPR_mail;

    /**
     * @ORM\OneToMany(targetEntity=Enfant::class, mappedBy="ENF_Parent")
     */
    private $enfants;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="representantLegals")
     */
    private $REPR_auteur;

    public function __construct()
    {
        $this->enfants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getREPRFullName() {        
        return "{$this->REPR_nom} {$this->REPR_prenom}";
    }

    public function getREPRNom(): ?string
    {
        return $this->REPR_nom;
    }

    public function setREPRNom(string $REPR_nom): self
    {
        $this->REPR_nom = $REPR_nom;

        return $this;
    }

    public function getREPRPrenom(): ?string
    {
        return $this->REPR_prenom;
    }

    public function setREPRPrenom(string $REPR_prenom): self
    {
        $this->REPR_prenom = $REPR_prenom;

        return $this;
    }

    public function getREPRAdresse(): ?string
    {
        return $this->REPR_adresse;
    }

    public function setREPRAdresse(string $REPR_adresse): self
    {
        $this->REPR_adresse = $REPR_adresse;

        return $this;
    }

    public function getREPRTel(): ?string
    {
        return $this->REPR_tel;
    }

    public function setREPRTel(string $REPR_tel): self
    {
        $this->REPR_tel = $REPR_tel;

        return $this;
    }

    public function getREPRMail(): ?string
    {
        return $this->REPR_mail;
    }

    public function setREPRMail(string $REPR_mail): self
    {
        $this->REPR_mail = $REPR_mail;

        return $this;
    }

    /**
     * @return Collection|Enfant[]
     */
    public function getEnfants(): Collection
    {
        return $this->enfants;
    }

    public function addEnfant(Enfant $enfant): self
    {
        if (!$this->enfants->contains($enfant)) {
            $this->enfants[] = $enfant;
            $enfant->setENFParent($this);
        }

        return $this;
    }

    public function removeEnfant(Enfant $enfant): self
    {
        if ($this->enfants->removeElement($enfant)) {
            // set the owning side to null (unless already changed)
            if ($enfant->getENFParent() === $this) {
                $enfant->setENFParent(null);
            }
        }

        return $this;
    }

    public function getREPRAuteur(): ?User
    {
        return $this->REPR_auteur;
    }

    public function setREPRAuteur(?User $REPR_auteur): self
    {
        $this->REPR_auteur = $REPR_auteur;

        return $this;
    }
}
