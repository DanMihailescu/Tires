<?php
// src/Controller/SearchController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class SearchController
{
    public function page()
    {
        return $this->render('search/searchBase.html.twig');
    }
}
?>