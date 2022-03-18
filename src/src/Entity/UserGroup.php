<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Doctrine\Common\Collections\Collection;

/**
 * User
 * @ORM\Table(name="usergroup")
 * @ORM\Entity()
 */
class UserGroup
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
     * Many users groups have many users
     * @ORM\ManyToMany(targetEntity="User", mappedBy="userGroups")
     */
    private Collection $users;
}