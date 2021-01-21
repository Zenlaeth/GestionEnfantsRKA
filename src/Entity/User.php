<?php

namespace App\Entity;

use App\Entity\Role;
use App\Entity\Enfant;
use App\Entity\Facturation;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use App\Entity\AnnulationFacturation;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Enfant::class, mappedBy="auteur")
     */
    private $enfants;

    /**
     * @ORM\ManyToMany(targetEntity=Role::class, mappedBy="users")
     */
    private $RolesUser;

    /**
     * @ORM\OneToMany(targetEntity=Facturation::class, mappedBy="FAC_auteur")
     */
    private $facturations;

    /**
     * @ORM\OneToMany(targetEntity=AnnulationFacturation::class, mappedBy="ANNU_auteur")
     */
    private $annulationFacturations;


    public function getFullName() {        
        return "{$this->nom} {$this->prenom}";
    }

    public function getTitreFullName() {
        foreach ($this->RolesUser as $role) {
            if ($role->getTitre() == "ROLE_ADMIN") {
                return "IT. {$this->nom} {$this->prenom}";
            }
            elseif ($role->getTitre() == "ROLE_FORMATEUR") {
                return "{$this->nom} {$this->prenom}";
            }
        }
    }

    public function __construct()
    {
        $this->RolesUser = new ArrayCollection();
        $this->enfants = new ArrayCollection();
        $this->roles = new ArrayCollection();
        $this->annulationFacturations = new ArrayCollection();
        $this->facturations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    // Fonctions obligatioires pour le User Interface

    public function getRoles()
    {
        $roles = $this->RolesUser->map(function($role){
            return $role->getTitre();
        })->ToArray();

        $roles[] = 'ROLE_FORMATEUR';

        return $roles;
    }
    
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getSalt()
    {
        
    }

    public function getUsername()
    {
        return $this->email;
    }


    public function eraseCredentials()
    {
        
    }

    /**
     * @return Collection|Role[]
     */
    public function getUserRoles(): Collection
    {
        return $this->RolesUser;
    }

    public function addUserRole(Role $userRole): self
    {
        if (!$this->RolesUser->contains($userRole)) {
            $this->RolesUser[] = $userRole;
            $userRole->addUser($this);
        }

        return $this;
    }

    public function removeUserRole(Role $userRole): self
    {
        if ($this->RolesUser->contains($userRole)) {
            $this->RolesUser->removeElement($userRole);
            $userRole->removeUser($this);
        }

        return $this;
    }

    // FIN UserInterface

    /**
     * @return \Doctrine\Common\Collections\Collection|Role[]
     */
    public function getRolesUser(): \Doctrine\Common\Collections\Collection
    {
        return $this->RolesUser;
    }

    public function addRolesUser(Role $rolesUser): self
    {
        if (!$this->RolesUser->contains($rolesUser)) {
            $this->RolesUser[] = $rolesUser;
        }

        return $this;
    }

    public function removeRolesUser(Role $rolesUser): self
    {
        $this->RolesUser->removeElement($rolesUser);

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
            $enfant->setENFAuteur($this);
        }

        return $this;
    }

    public function removeEnfant(Enfant $enfant): self
    {
        if ($this->enfants->removeElement($enfant)) {
            // set the owning side to null (unless already changed)
            if ($enfant->getENFAuteur() === $this) {
                $enfant->setENFAuteur(null);
            }
        }

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
            $facturation->setFACAuteur($this);
        }

        return $this;
    }

    public function removeFacturation(Facturation $facturation): self
    {
        if ($this->facturations->removeElement($facturation)) {
            // set the owning side to null (unless already changed)
            if ($facturation->getFACAuteur() === $this) {
                $facturation->setFACAuteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|AnnulationFacturation[]
     */
    public function getAnnulationFacturations(): Collection
    {
        return $this->annulationFacturations;
    }

    public function addAnnulationFacturation(AnnulationFacturation $annulationFacturation): self
    {
        if (!$this->annulationFacturations->contains($annulationFacturation)) {
            $this->annulationFacturations[] = $annulationFacturation;
            $annulationFacturation->setANNUAuteur($this);
        }

        return $this;
    }

    public function removeAnnulationFacturation(AnnulationFacturation $annulationFacturation): self
    {
        if ($this->annulationFacturations->removeElement($annulationFacturation)) {
            // set the owning side to null (unless already changed)
            if ($annulationFacturation->getANNUAuteur() === $this) {
                $annulationFacturation->setANNUAuteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ModificationFacturation[]
     */
    public function getModificationFacturations(): Collection
    {
        return $this->modificationFacturations;
    }

    public function addModificationFacturation(ModificationFacturation $modificationFacturation): self
    {
        if (!$this->modificationFacturations->contains($modificationFacturation)) {
            $this->modificationFacturations[] = $modificationFacturation;
            $modificationFacturation->setMODIFAuteur($this);
        }

        return $this;
    }

    public function removeModificationFacturation(ModificationFacturation $modificationFacturation): self
    {
        if ($this->modificationFacturations->removeElement($modificationFacturation)) {
            // set the owning side to null (unless already changed)
            if ($modificationFacturation->getMODIFAuteur() === $this) {
                $modificationFacturation->setMODIFAuteur(null);
            }
        }

        return $this;
    }
}
