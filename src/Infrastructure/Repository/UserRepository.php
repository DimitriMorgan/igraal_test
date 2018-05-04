<?php
/**
 * Created by PhpStorm.
 * User: wilson
 * Date: 03/05/18
 * Time: 16:33
 */

namespace Infrastructure\Repository;


use Doctrine\ORM\EntityManagerInterface;
use Domain\Model\User;
use Domain\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function add(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function getByIdWithCommissions(int $id): ?User
    {
        $queryBuilder = $this->entityManager
            ->createQueryBuilder()
            ->select('user')
            ->from(User::class, 'user')
            ->join('user.commissions', 'commissions', 'WITH', 'commissions.idUser = :id')
            ->where('user.id = :id')
            ->setParameter('id', $id)
        ;

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    public function getById(int $id): ?User
    {
        $queryBuilder = $this->entityManager
            ->createQueryBuilder()
            ->select('user')
            ->from(User::class, 'user')
            ->where('user.id = :id')
            ->setParameter('id', $id)
        ;

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }
}