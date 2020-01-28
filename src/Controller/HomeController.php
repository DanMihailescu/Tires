<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class homeController extends Controller
{
    public function home()
    {
        $veh = new vehicleController();
        $veh->createVehicle("m","l",134);

        //if usr logged
        return $this->render('home.html.twig');
        //if usr not logged
        //something
    }
}
?>