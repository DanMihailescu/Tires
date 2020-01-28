<?php

namespace App\Repository;

use App\Entity\ShopTires;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ShopTires|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShopTires|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShopTires[]    findAll()
 * @method ShopTires[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShopTiresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShopTires::class);
    }

    // /**
    //  * @return ShopTires[] Returns an array of ShopTires objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ShopTires
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
