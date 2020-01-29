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
            AND t.rimDiameter = :riimDiameter'
        )->setParameters(array('width'=>$width, 'tireProfile'=>$tireProfile, 'rimDiameter'=>$rimDiameter));

        // returns an array of ShopTire objects
        return $query->getResult();
    }

    /**
    * @return ShopTire[] Returns an filtered array of tire objects with a certain brand
    */
    public function filterBrand($width, $tireProfile, $rimDiameter, $brand): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT t
            FROM App\Entity\ShopTire t
            WHERE t.width = :width
            AND t.tireProfile = :tireProfile
            AND t.rimDiameter = :riimDiameter
            AND t.brand = :brand'
        )->setParameters(array('width'=>$width, 'tireProfile'=>$tireProfile, 'rimDiameter'=>$rimDiameter, 
        'brand'=>$brand));

        // returns an array of ShopTire objects
        return $query->getResult();
    }

    /**
    * @return ShopTire[] Returns an filtered array of tire objects with a certain traction rating
    */
    public function filterTraction($width, $tireProfile, $rimDiameter, $tractionRating): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT t
            FROM App\Entity\ShopTire t
            WHERE t.width = :width
            AND t.tireProfile = :tireProfile
            AND t.rimDiameter = :riimDiameter
            AND t.tractionRating = :tractionRating'
        )->setParameters(array('width'=>$width, 'tireProfile'=>$tireProfile, 'rimDiameter'=>$rimDiameter, 
        'tractionRating'=>$tractionRating));

        // returns an array of ShopTire objects
        return $query->getResult();
    }

    /**
    * @return ShopTire[] Returns an filtered array of tire objects with a certain temperature rating
    */
    public function filterTemperature($width, $tireProfile, $rimDiameter, $temperatureRating): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT t
            FROM App\Entity\ShopTire t
            WHERE t.width = :width
            AND t.tireProfile = :tireProfile
            AND t.rimDiameter = :riimDiameter
            AND t.temperatureRating = :temperatureRating'
        )->setParameters(array('width'=>$width, 'tireProfile'=>$tireProfile, 'rimDiameter'=>$rimDiameter, 
        'temperatureRating'=>$temperatureRating));

        // returns an array of ShopTire objects
        return $query->getResult();
    }

    /**
    * @return ShopTire[] Returns an filtered array of tire objects with a certain thread rating
    */
    public function filterThread($width, $tireProfile, $rimDiameter, $threadRating): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT t
            FROM App\Entity\ShopTire t
            WHERE t.width = :width
            AND t.tireProfile = :tireProfile
            AND t.rimDiameter = :riimDiameter
            AND t.temperatureRating = :temperatureRating'
        )->setParameters(array('width'=>$width, 'tireProfile'=>$tireProfile, 'rimDiameter'=>$rimDiameter, 
        'threadRating'=>$threadRating));

        // returns an array of ShopTire objects
        return $query->getResult();
    }

    /**
    * @return ShopTire[] Returns an filtered array of tire objects with a certain thread 
    */
    public function filterCurrentThread($width, $tireProfile, $rimDiameter, $currentThread): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT t
            FROM App\Entity\ShopTire t
            WHERE t.width = :width
            AND t.tireProfile = :tireProfile
            AND t.rimDiameter = :riimDiameter
            AND t.currentThread = :currentThread'
        )->setParameters(array('width'=>$width, 'tireProfile'=>$tireProfile, 'rimDiameter'=>$rimDiameter, 
        'currentThread'=>$currentThread));

        // returns an array of ShopTire objects
        return $query->getResult();
    }

    /**
    * @return ShopTire[] Returns an filtered array of tire objects with a certain thread 
    */
    public function filterPrice($width, $tireProfile, $rimDiameter, $priceLow, $prieHigh): array
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT t
            FROM App\Entity\ShopTire t
            WHERE t.width = :width
            AND t.tireProfile = :tireProfile
            AND t.rimDiameter = :riimDiameter
            AND t.priceLow >= :priceLow
            AND t.prieHigh <= :prieHigh'
        )->setParameters(array('width'=>$width, 'tireProfile'=>$tireProfile, 'rimDiameter'=>$rimDiameter, 
        'priceLow'=>$priceLow, 'prieHigh'=>$prieHigh));

        // returns an array of ShopTire objects
        return $query->getResult();
    }

    /**
    * @return ShopTire[] Returns an array of tire objects with a certain brand
    */
    public function filterAll($width, $tireProfile, $rimDiameter, $brand, $tractionRating, 
    $temperatureRating, $threadRating, $currentThread, $price): array
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