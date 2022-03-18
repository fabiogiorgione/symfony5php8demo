<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;

/**
 * User
 * @ORM\Table(name="policygroup")
 * @ORM\Entity()
 */
class PolicyGroup
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
     * Many Policy groups have many users
     * @ORM\ManyToMany(targetEntity="User", mappedBy="policyGroups", cascade={"persist"})
     */
    private Collection $users;
}