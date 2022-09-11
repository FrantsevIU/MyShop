<?php

namespace App\Repository;

use App\Entity\PropertiesProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PropertiesProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method PropertiesProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method PropertiesProducts[]    findAll()
 * @method PropertiesProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertiesProductsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PropertiesProducts::class);
    }

     /**
      * @return PropertiesProducts[] Returns an array of PropertiesProducts objects
      */
//    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->Where('p.id IN(:val)')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?PropertiesProducts
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
