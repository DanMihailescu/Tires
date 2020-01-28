<?php

namespace App\Repository;

use App\Entity\Vehicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Vehicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicle[]    findAll()
 * @method Vehicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicle::class);
    }

    /**
    * @return Vehicle[] Returns an array of Vehicle objects
    */
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findOneBySomeField($value): ?Vehicle
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
    * @return Vehicle[] Returns an array of Vehicle objects with a certain brand
    */
    public function findAllWithBrand($brand): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT v
            FROM App\Entity\Vehicle v
            WHERE v.brand = :brand'
        )->setParameter('brand', $brand);

        // returns an array of Vehicle objects
        return $query->getResult();
    }

    /**
    * @return Vehicle[] Returns an array of Vehicle objects with a certain brand and model
    */
    public function findAllYears($brand,$model): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT v
            FROM App\Entity\Vehicle v
            WHERE v.brand = :brand
            AND v.model = :model'
        )->setParameters(array('brand'=>$brand, 'model'=>$model));

        // returns an array of Vehicle objects
        return $query->getResult();
    }
}
