<?php

namespace App\Controller;
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

// ...
use App\Entity\vehicle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VehicleController 
{
    public function createVehicle($b,$m,$y): Response
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $vehicle = new Vehicle();
        $vehicle->setBrand($b);
        $vehicle->setModel($m);
        $vehicle->setYear($y);

        // tell Doctrine you want to (eventually) save the vehicle (no queries yet)
        $entityManager->persist($vehicle);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new vehicle with id '.$vehicle->getId());
    }
}
