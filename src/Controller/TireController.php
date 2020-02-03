<?php

namespace App\Controller;

use App\Entity\ShopTire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Twig_Extension;
use Twig_Loader_Filesystem;
use Twig_Environment;


require_once '../vendor/autoload.php';

class TireController extends Controller {

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
         if ( isset($_POST['width']) && isset($_POST['depth']) && isset($_POST['radius'])){ 
            // retrieve the form data by using the element's name attributes value as key 
            $w = $_POST['width']; 
            $p = $_POST['depth']; 
            $r = $_POST['radius'];

            $tires = $this->getDoctrine()
            ->getRepository(ShopTire::class)
            ->findBySize($w,$p,$r);
            
            return $this->render('search/seachBase.html.twig', array('tires' => $tires));
        }
        else {
            echo "User didnt enter values";
            exit;
        }
        return $this->render('home.html.twig');
    }

    /** 
     * @Route("/search_vehicle", name="searchByVehicle")
     */
    function searchByVehicle()
    {
         // Check if the form is submitted  
         if ( isset($_POST['width']) ){ 
            // retrieve the form data by using the element's name attributes value as key 
            $w = $_POST['width']; 
            $p = $_POST['depth']; 
            $r = $_POST['radius'];

            $tires = $this->getDoctrine()
            ->getRepository(ShopTire::class)
            ->findBySize($w,$p,$r);
            
            return $this->render('search/seachBase.html.twig', array('tires' => $tires));
        }
        else {
            echo "User didnt enter values";
            exit;
        }
        return $this->render('home.html.twig');
    }
}