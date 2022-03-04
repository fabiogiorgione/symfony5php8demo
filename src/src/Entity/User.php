<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Ramsey\Uuid\Doctrine\UuidGenerator;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements UserInterface
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
    #[ORM\GeneratedValue]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private $id_user;

    #[ORM\Column(type: 'string', length: 255)]
    private $username;

    #[ORM\Column(type: 'string', length: 255)]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    /**
     * Many Users have many Users.
     * @ORM\ManyToMany(targetEntity="Policy", inversedBy="users")
     * @ORM\JoinTable(name="user_policy",
     *      joinColumns={@ORM\JoinColumn(name="id_user", referencedColumnName="id_user")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_policy", referencedColumnName="id_policy")}
     *      )
     */
    private Collection $userPolicies;

    /**
     * One User has One Group.
     * @ORM\OneToOne(targetEntity="UserGroup")
     * @ORM\JoinColumn(name="id_group", referencedColumnName="id_group")
     */
    private UserGroup $userGroup;

    public function getIdUser()
    {
        return $this->id_user;
    }

    public function setIdUser($id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRoles()
    {
        // TODO: Implement getRoles() method.
        return [
            'admin',
            'user',
        ];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
