<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Film;
use App\Entity\FilmStuff;
use App\Entity\Gallery;
use Doctrine\ORM\EntityManagerInterface;

class FilmController extends AbstractController
{

	public function getFilms()
    {
    	// extract genre from query (genre parameter) and request for matched films
        $genre = $_GET['genre'];
        $films = $this->getDoctrine()
            ->getRepository(Film::class)
            ->findBy(array('id_genre' => $genre));

        return $this->json(['film_id' => $films], $status = 200);
    }

    public function getFilm($filmID)
    {
        $film = $this->getDoctrine()
            ->getRepository(Film::class)
            ->find($filmID);
    	
        $link = $film->getLink();

        return $this->json(['link' => $link], $status = 200);
    }

    public function putFilm($filmID)
    {

        $request = Request::createFromGlobals();
        $data = json_decode($request->getContent());
        $link = $data->link;  

        $entityManager = $this->getDoctrine()->getManager();

        $film = new Film();
        $film->setLink($link);

        $entityManager->persist($film);

        $entityManager->flush();
        
        //return $this->json(['id' => $film->getId(),], $status = 201);
        return $this->json(['link' => $link,], $status = 201);
    }

    public function patchFilm($filmID)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $film = $entityManager->getRepository(Film::class)->find($filmID);

        $request = Request::createFromGlobals();
        $data = json_decode($request->getContent());
        $link = $data->link;  

        $film->setLink($link);
        $entityManager->flush();

        return $this->json(['link' => $film->getLink(),], $status = 200);
    }

    public function deleteFilm($filmID)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $film = $entityManager->getRepository(Film::class)->find($filmID);

        $entityManager->remove($film);
        $entityManager->flush();

        return $this->json('', $status = 204);
    }

    public function getFilmGallery($filmID)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $film = $entityManager->getRepository(Film::class)->find($filmID);

        return $this->json(['images' => $film->getIdGallery()->getImages()], $status = 200);
    }

    public function putFilmGallery($filmID)
    {
        $gallery = new Gallery();

        $request = Request::createFromGlobals();
        $data = json_decode($request->getContent());
        $images = $data->images;  
        $gallery->setImages($images);

        $entityManager = $this->getDoctrine()->getManager();
        $film = $entityManager->getRepository(Film::class)->find($filmID);

        // relates this product to the category
        $film->setIdGallery($gallery);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($gallery);
        $entityManager->persist($film);
        $entityManager->flush();

        return $this->json(['images' => $film->getIdGallery()->getImages()], $status = 201);
    }

    public function deleteFilmGallery($filmID)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $film = $entityManager->getRepository(Film::class)->find($filmID);

        $gallery = $film->getIdGallery();
        $images = $gallery->getImages();

        $film->setIdGallery(null);
        $entityManager->remove($gallery);
        $entityManager->flush();

        return $this->json(['images' => $images], $status = 204);
    }

    public function getFilmSimilar($filmID)
    {
        // some algorithm of finding similarity has to be here

        return $this->json(['film_id' => ['similarid1he54yu4sdgshg', 'similarid2gadsgasegs352sdgf',],], $status = 200);
    }

    public function getFilmStuff($filmID)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $film = $entityManager->getRepository(Film::class)->find($filmID);

        return $this->json($film->getIdStuff(), $status = 200);
    }

    public function putFilmStuff($filmID)
    {
        $stuff = new FilmStuff();

        $request = Request::createFromGlobals();
        $data = json_decode($request->getContent());
        $stuff->setAuthor($data->author);
        $stuff->setDirector($data->director);
        $stuff->setProducer($data->producer);
        $stuff->setActor($data->actor);

        $entityManager = $this->getDoctrine()->getManager();
        $film = $entityManager->getRepository(Film::class)->find($filmID);

        $film->setIdStuff($stuff);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($stuff);
        $entityManager->persist($film);
        $entityManager->flush();

        return $this->json($film->getIdStuff(), $status = 201);
    }

    public function patchFilmStuff($filmID)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $film = $entityManager->getRepository(Film::class)->find($filmID);
        $stuff = $film->getIdStuff();

        $request = Request::createFromGlobals();
        $data = json_decode($request->getContent());
        $stuff->setAuthor($data->author);
        $stuff->setDirector($data->director);
        $stuff->setProducer($data->producer);
        $stuff->setActor($data->actor);

        $entityManager->flush();

        return $this->json($stuff, $status = 200);
    }

    public function deleteFilmStuff($filmID)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $film = $entityManager->getRepository(Film::class)->find($filmID);

        $stuff = $film->getIdStuff();

        $film->setIdStuff(null);
        $entityManager->remove($stuff);
        $entityManager->flush();

        return $this->json('', $status = 204);
    }
}

?>