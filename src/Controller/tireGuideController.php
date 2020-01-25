<?php
// src/Controller/tireGuideController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class tireGuideController
{
    public function page()
    {
        return $this->render('search/tireGuide.html.twig');
    }
}
?>