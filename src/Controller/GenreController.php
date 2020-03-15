<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GenreController extends AbstractController
{
    public function getGenres()
    {
        return $this->json(['genre' => ['action', 'history', 'detective',],], $status = 200);
    }
}

?>