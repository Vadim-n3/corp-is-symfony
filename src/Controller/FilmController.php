<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmController extends AbstractController
{

	public function getFilms()
    {
    	// extract genre from query (genre parameter) and request for matched films
        return $this->json(['film_id' => ['matchedgenrefilmid1', 'matchedgenrefilmid2',],], $status = 200);
    }

    public function getFilm($filmID)
    {
    	$films = [
    		[
	    		'id' => 'f1',
	    		'link' => 'dgsdhsehsdhrs3251a',
    		],
    		[
	    		'id' => 'f2',
	    		'link' => 'jgfjag43q2fszxveawt',
    		],
    	];

    	$result = "";
    	foreach ($films as $value)
    	{
    		if ($value['id'] == $filmID)
    		{
    			$result = ['link' => $value['link'],];
    		}
    	}
        return $this->json($result, $status = 200);
    }

    public function putFilm($filmID)
    {
        return $this->json(['link' => 'created_link',], $status = 201);
    }

    public function patchFilm($filmID)
    {
        return $this->json(['link' => 'updated_link',], $status = 200);
    }

    public function deleteFilm($filmID)
    {
        return $this->json('', $status = 204);
    }

    public function getFilmGallery($filmID)
    {
        return $this->json(['images' => ['binaryimage1', 'binaryimage2',],], $status = 200);
    }

    public function putFilmGallery($filmID)
    {
        return $this->json(['images' => ['createdbinaryimage1', 'createdbinaryimage2',],], $status = 201);
    }

    public function deleteFilmGallery($filmID)
    {
        return $this->json(['images' => ['deletedbinaryimage1', 'deletedbinaryimage2',],], $status = 204);
    }

    public function getFilmSimilar($filmID)
    {
        return $this->json(['film_id' => ['similarid1he54yu4sdgshg', 'similarid2gadsgasegs352sdgf',],], $status = 200);
    }

    public function getFilmStuff($filmID)
    {
        return $this->json(['author' => ['author1', 'author2'],
					        'director' => ['director1', 'director2'],
					        'producer' => ['producer1'], 'actor' => ['actor1', 'actor2'],
					        'genre' => ['action', 'detective',],
					        ],
					        $status = 200);
					    }

    public function putFilmStuff($filmID)
    {
        return $this->json(['author' => ['newauthor1', 'newauthor2'],
					        'director' => ['newdirector1', 'newdirector2'],
					        'producer' => ['newproducer1'],
					        'actor' => ['newactor1', 'newactor2'],
					        'genre' => ['action', 'detective',],
					        ],
					        $status = 201);
    }

    public function patchFilmStuff($filmID)
    {
        return $this->json(['author' => ['updauthor1', 'updauthor2',],
					        'director' => ['upddirector1', 'upddirector2',],
					        'producer' => ['updproducer1',],
					        'actor' => ['udpactor1', 'udpactor2',],
					        'genre' => ['action', 'detective',],
					        ],
					        $status = 200);
    }

    public function deleteFilmStuff($filmID)
    {
        return $this->json('', $status = 204);
    }
}

?>