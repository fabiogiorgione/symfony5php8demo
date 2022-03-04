<?php

namespace App\Entity;

use App\Repository\PolicyGroupRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;

#[ORM\Entity(repositoryClass: PolicyGroupRepository::class)]
class PolicyGroup
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid')]
    #[ORM\GeneratedValue]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private $id_group;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    /**
     * Many Categories have One Category.
     * @ORM\OneToMany(targetEntity="Policy", inversedBy="policiesGroup")
     */
    private Policy $policiesGroup;

    public function getIdGroup()
    {
        return $this->id_group;
    }

    public function setIdGroup($id_group): self
    {
        $this->id_group = $id_group;

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
}
