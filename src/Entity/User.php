<?php

namespace App\Entity;

use App\Entity\Role;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    // Fonctions obligatioires pour le User Interface

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
    
    public function getRoles()
    {
        $roles = $this->RolesUser->map(function($role){
            return $role->getTitre();
        })->ToArray();

        $roles[] = 'ROLE_FORMATEUR';

        return $roles;
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
}
