<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;

/**
 * User
 * @ORM\Table(name="policy")
 * @ORM\Entity()
 */
class Policy
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
     * Many Policies have Many Users.
     * @var Collection
     * @ORM\ManyToMany(targetEntity="User", mappedBy="policies", fetch="EAGER", cascade={"persist"})
     *
     */
    protected Collection $users;
}