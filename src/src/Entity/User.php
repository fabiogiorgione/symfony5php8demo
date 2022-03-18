<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Ramsey\Uuid\Doctrine\UuidGenerator;

/**
 * User
 * @ORM\Table(name="user_data")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{

    /**
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $username;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $password;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $salt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $surname;

    /**
     * @ORM\Column(type="string")
     */
    private $email;

    /**
     * @var array $roles
     *
     * @ORM\Column(type="array")
     */
    private array $roles = ['ROLE_USER', 'ROLE_ADMIN'];

    /**
     * Many Users have Many Users Groups.
     * @var UserGroup[]
     * @ORM\ManyToMany(targetEntity="UserGroup", inversedBy="users", fetch="EAGER", cascade={"persist"})
     * @ORM\JoinTable(name="users_groups")
     */
    private Collection $userGroups;

    /**
     * Many Users have Many Policy Groups.
     * @var PolicyGroup[]
     * @ORM\ManyToMany(targetEntity="PolicyGroup", inversedBy="users", fetch="EAGER", cascade={"persist"})
     * @ORM\JoinTable(name="users_policygroups")
     */
    private Collection $policyGroups;

    /**
     * Many users have many policies
     * @var Policy[]
     * @ORM\ManyToMany(targetEntity="Policy", inversedBy="users", fetch="EAGER", cascade={"persist"})
     * @ORM\JoinTable(name="users_policies")
     */
    private Collection $policies;

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getSalt(): ?string
    {
        return $this->salt;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getId(): \Ramsey\Uuid\UuidInterface
    {
        return $this->id;
    }

    /**
     * @param \Ramsey\Uuid\UuidInterface $id
     */
    public function setId(\Ramsey\Uuid\UuidInterface $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return UserGroup[]
     */
    public function getUserGroups(): Collection|array
    {
        return $this->userGroups;
    }

    /**
     * @param UserGroup[] $userGroups
     */
    public function setUserGroups(Collection|array $userGroups): void
    {
        $this->userGroups = $userGroups;
    }

    /**
     * @return PolicyGroup[]
     */
    public function getPolicyGroups(): Collection|array
    {
        return $this->policyGroups;
    }

    /**
     * @param PolicyGroup[] $policyGroups
     */
    public function setPolicyGroups(Collection|array $policyGroups): void
    {
        $this->policyGroups = $policyGroups;
    }

    /**
     * @return Policy[]
     */
    public function getPolicies(): Collection|array
    {
        return $this->policies;
    }

    /**
     * @param Policy[] $policies
     */
    public function setPolicies(Collection|array $policies): void
    {
        $this->policies = $policies;
    }


}