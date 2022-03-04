<?php

namespace App\Entity;

use App\Repository\PolicyRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;

#[ORM\Entity(repositoryClass: PolicyRepository::class)]
class Policy
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
    #[ORM\GeneratedValue]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private $id_policy;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $action;

    /**
     * Many Users have Many Users.
     * @ORM\ManyToMany(targetEntity="User", mappedBy="userPolicies")
     */
    private Collection $users;

    /**
     * Many Categories have One Category.
     * @ORM\ManyToOne(targetEntity="PolicyGroup", inversedBy="policiesGroup")
     * @ORM\JoinColumn(name="id_group", referencedColumnName="id_group")
     */
    private PolicyGroup $policiesGroup;

    public function getIdPolicy()
    {
        return $this->id_policy;
    }

    public function setIdPolicy($id_policy): self
    {
        $this->id_policy = $id_policy;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setAction($action): self
    {
        $this->action = $action;

        return $this;
    }
}
