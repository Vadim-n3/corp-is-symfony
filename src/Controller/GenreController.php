<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Genre;
use Doctrine\ORM\EntityManagerInterface;

class GenreController extends AbstractController
{
    public function getGenres()
    {
    	$entityManager = $this->getDoctrine()->getManager();
        $genres = $entityManager->getRepository(Genre::class)->findAll();

        return $this->json(['genre' => $genres], $status = 200);
    }
}

?>