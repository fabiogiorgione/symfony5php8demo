<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends EntityRepository
{

    public function getById($value): ?User
    {
        $user = $this->createQueryBuilder('u')
            ->andWhere('u.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            //->enableResultCache(3600 * 1, User::class . "detail")
            ->getOneOrNullResult();
        if (!$user instanceof User) {
            throw new EntityNotFoundException();
        }
        return $user;
    }

    public function delete($id): bool
    {
        $this->getById($id);
        return $this->createQueryBuilder('u')
            ->delete(User::class, 'u')
            ->andWhere('u.id = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->execute();

    }

}