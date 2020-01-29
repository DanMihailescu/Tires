<?php

namespace App\Controller;

use App\Entity\Vehicle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TireController extends AbstractController {

    /**
     * @Route("/tire", name="createTire")
     */
    function createTire($brand,$width,$tireProfile,$rimDiameter,$tractionRating,$temperatureRating,$threadRating,$currentThread,$price): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $tire = new ShopTire();
        $tire = $tire->setBrand($brand);
        $tire = $tire->setWidth($width);
        $tire = $tire->setTireProfile($tireProfile);
        $tire = $tire->setRimeDiameter($rimDiameter);
        $tire = $tire->setTractionRating($tractionRating);
        $tire = $tire->setTemperatureRating($temperatureRating);
        $tire = $tire->setThreadRating($threadRating);
        $tire = $tire->setCurrentThread($currentThread);
        $tire = $tire->setPrice($price);

        // tell Doctrine you want to (eventually) save the vehicle (no queries yet)
        $entityManager->persist($tire);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new vehicle with id '.$tire->getId());
    }

    /**
     * @Route("/find-models/{brand}", name="createVehicle")
     */
    function findModels($brand)
    {
        $vehicles = $this->getDoctrine()
        ->getRepository(Vehicle::class)
        ->findAllWithBrand($brand);
        $models = array();
        
        foreach ($vehicles as $v) {
            array_push($models, $v->getModel());
            //echo 'Found the model: '.$v->getYear()." ".$v->getModel().'<br>';
        }

        $models = array_unique($models);
    }

    /**
     * @Route("/find-years/{brand}/{model}", name="findYears")
     */
    function findYears($brand,$model)
    {        
        $vehicles = $this->getDoctrine()
        ->getRepository(Vehicle::class)
        ->findAllYears($brand,$model);
    
        $years = array();
        
        foreach ($vehicles as $y) {
            array_push($years, $y->getYear());
            echo 'Found the year: ' . $y->getYear() . '<br>';
        }

        $years = array_unique($years);
    }
}