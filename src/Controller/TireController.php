<?php

namespace App\Controller;

use App\Entity\ShopTire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TireController extends AbstractController {

    /*
     * Route("/create-tire", name="createTire")
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
     * @Route("/search", name="searchBySize")
     */
    function searchBySize()
    {
         // Check if the form is submitted 
         if ( isset($_POST['width']) ){ 
            // retrieve the form data by using the element's name attributes value as key 
            $w = $_POST['width']; 
            $p = $_POST['depth']; 
            $r = $_POST['radius'];
            // display the results echo 
            echo 'Width: ' . $w . '. Profile: ' . $p . '. Rim Diameter: ' . $r; 
            $tires = $this->getDoctrine()
            ->getRepository(ShopTire::class)
            ->findBySize($w,$p,$r);

            foreach($tires as $t){
                echo "Tire brand: " . $t->getBrand();
            }
        }
        else {
            echo "User didnt enter values";
            exit;
        }
        return $this->render('search/seachBase.html.twig');
    }
}