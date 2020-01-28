<?php
    //$_GET variables
    //$_POST variables
    //using url parameters  ie /search/10/...in controller I get test = 10;
    // session variables (client side cache)
    // AUTHENTICATION ROUTES and variable should be obviously included

    // cookies (user side browser cache we have to notify user)
    //we should have names for routes like POST GET and PUT. 
    // You can also have DELETE ROUTES and UPDATE Routes and CREATE routes depending on function.
    //    Essentially  CRUD functionality. A router should be able to be readable like a cheat sheet for the 
    //  application. F
namespace App\Controller;

use App\Entity\Vehicle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class vehicleController extends AbstractController {

    /**
     * @Route("/vehicle/{brand}/{model}/{year}", name="createVehicle")
     */
    function createVehicle($brand,$model,$year): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $vehicle = new Vehicle();
        $vehicle = $vehicle->setBrand($brand);
        $vehicle = $vehicle->setModel($model);
        $vehicle = $vehicle->setYear($year);

        // tell Doctrine you want to (eventually) save the vehicle (no queries yet)
        $entityManager->persist($vehicle);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new vehicle with id '.$vehicle->getId());
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

?>