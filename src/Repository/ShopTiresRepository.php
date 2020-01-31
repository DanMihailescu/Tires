<?php

namespace App\Repository;

use App\Entity\ShopTire;
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
        parent::__construct($registry, ShopTire::class);
    }

    /**
    * @return ShopTires[] Returns an array of tire objects
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

    public function findOneBySomeField($value): ?ShopTire
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
    * @return ShopTire[] Returns an array of tire objects with a certain size
    */
    public function findBySize($width, $tireProfile, $rimDiameter): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT t
            FROM App\Entity\ShopTire t
            WHERE t.width = :width
            AND t.tireProfile = :tireProfile
            AND t.rimDiameter = :rimDiameter'
        )->setParameters(array('width'=>$width, 'tireProfile'=>$tireProfile, 'rimDiameter'=>$rimDiameter));

        // returns an array of ShopTire objects
        return $query->getResult();
    }

    /**
    * @return ShopTire[] Returns an filtered array of tire objects with a certain brand
    */
    public function filterBrand ($tires, $brand): array
    {
        $arr = array();
        foreach($tires as $t) {
            if ($t->getBrand() == $brand) {
                array_push($arr, $t->getBrand());
            }
        }
        return $arr;
    }

    /**
    * @return ShopTire[] Returns an filtered array of tire objects with a certain traction rating
    */
    public function filterTraction ($tires, $tractionRating): array
    {
        $arr = array();
        foreach($tires as $t) {
            if ($t->getTractionRating() == $tractionRating) {
                array_push($arr, $t->getTractionRating());
            }
        }
        return $arr;
    }

    /**
    * @return ShopTire[] Returns an filtered array of tire objects with a certain traction rating
    */
    public function filterTemperature ($tires, $temperatureRating): array
    {
        $arr = array();
        foreach($tires as $t) {
            if ($t->getTemperatureRating() == $temperatureRating) {
                array_push($arr, $t->getTemperatureRating());
            }
        }
        return $arr;
    }

    /**
    * @return ShopTire[] Returns an filtered array of tire objects with a certain traction rating
    */
    public function filterThread ($tires, $threadRating): array
    {
        $arr = array();
        foreach($tires as $t) {
            if ($t->getThreadRating() == $threadRating) {
                array_push($arr, $t->getThreadRating());
            }
        }
        return $arr;
    }

    /**
    * @return ShopTire[] Returns an filtered array of tire objects with a certain traction rating
    */
    public function filterCurrentThread ($tires, $currentThread): array
    {
        $arr = array();
        foreach($tires as $t) {
            if ($t->getCurrentThread() == $currentThread) {
                array_push($arr, $t->getCurrentThread());
            }
        }
        return $arr;
    }

    /**
    * @return ShopTire[] Returns an filtered array of tire objects with a certain traction rating
    */
    public function filterPrice ($tires, $priceLow, $priceHigh): array
    {
        $arr = array();
        foreach($tires as $t) {
            if ($priceLow <= $t->getPrice() && $t->getPrice() <= $priceHigh) {
                array_push($arr, $t->getCurrentThread());
            }
        }
        return $arr;
    }

    /**
    * @return ShopTire[] Returns an array of tire objects with a certain brand
    */
    public function filterAll($width, $tireProfile, $rimDiameter, $brand, $tractionRating, 
    $temperatureRating, $threadRating, $currentThread, $priceLow, $priceHigh): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT t
            FROM App\Entity\ShopTire t
            WHERE t.width = :width
            AND t.tireProfile = :tireProfile
            AND t.rimDiameter = :riimDiameter
            AND t.brand = :brand
            AND t.tractionRating = :tractionRating
            AND t.temperatureRating = :temperatureRating
            AND t.threadRating = :threadRating
            AND t.currentThread = :currentThread
            AND t.price = :price'
        )->setParameters(array('width'=>$width, 'tireProfile'=>$tireProfile, 'rimDiameter'=>$rimDiameter, 
        'brand'=>$brand, 'tractionRating'=>$tractionRating, 'temperatureRating'=>$temperatureRating, 
        'threadRating'=>$threadRating, 'currentThread'=>$currentThread, 'price'=>$price));

        // returns an array of ShopTire objects
        return $query->getResult();
    }
}