<?php

namespace App\Repository;

use App\Entity\CategoryId;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategoryId|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryId|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryId[]    findAll()
 * @method CategoryId[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryIdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryId::class);
    }

    // /**
    //  * @return CategoryId[] Returns an array of CategoryId objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoryId
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
