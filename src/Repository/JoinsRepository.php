<?php

namespace App\Repository;

use App\Entity\Joins;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Joins|null find($id, $lockMode = null, $lockVersion = null)
 * @method Joins|null findOneBy(array $criteria, array $orderBy = null)
 * @method Joins[]    findAll()
 * @method Joins[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoinsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Joins::class);
    }

    // /**
    //  * @return Joins[] Returns an array of Joins objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Joins
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
