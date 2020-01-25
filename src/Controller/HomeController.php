<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function home()
    {
    	//include 'home.html';
        return $this->render('home.html.twig');
    }
}
?>