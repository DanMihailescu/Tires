<?php
// src/Controller/SearchController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class SearchController
{
    public function home()
    {
        //include 'home.html';
        return $this->render('search/searchBase.html.twig');
    }
}
?>