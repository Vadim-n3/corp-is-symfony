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

    public function getFilm($id)
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
    	foreach ($films as $value) if ($value['CityID'] == $id) 
    	{
    		if ($value['id'] == $id)
    		{
    			$result = $value['link'];
    		}
    	}
        return $this->json($result, $status = 200);
    }

    public function putFilm($id)
    {
        return $this->json(['link' => 'created_link',], $status = 201);
    }

    public function patchFilm($id)
    {
        return $this->json(['link' => 'updated_link',], $status = 200);
    }

    public function deleteFilm($id)
    {
        return $this->json('', $status = 204);
    }

    public function getFilmGallery($id)
    {
        return $this->json(['images' => ['binaryimage1', 'binaryimage2',],], $status = 200);
    }

    public function putFilmGallery($id)
    {
        return $this->json(['images' => ['createdbinaryimage1', 'createdbinaryimage2',],], $status = 201);
    }

    public function deleteFilmGallery($id)
    {
        return $this->json(['images' => ['deletedbinaryimage1', 'deletedbinaryimage2',],], $status = 204);
    }

    public function getFilmSimilar($id)
    {
        return $this->json(['film_id' => ['similarid1he54yu4sdgshg', 'similarid2gadsgasegs352sdgf',],], $status = 200);
    }

    public function getFilmStuff($id)
    {
        return $this->json(['author' => ['author1', 'author2'],
					        'director' => ['director1', 'director2'],
					        'producer' => ['producer1'], 'actor' => ['actor1', 'actor2'],
					        'genre' => ['action', 'detective',],
					        ],
					        $status = 200);
					    }

    public function putFilmStuff($id)
    {
        return $this->json(['author' => ['newauthor1', 'newauthor2'],
					        'director' => ['newdirector1', 'newdirector2'],
					        'producer' => ['newproducer1'],
					        'actor' => ['newactor1', 'newactor2'],
					        'genre' => ['action', 'detective',],
					        ],
					        $status = 200);
    }

    public function patchFilmStuff($id)
    {
        return $this->json(['author' => ['updauthor1', 'updauthor2',],
					        'director' => ['upddirector1', 'upddirector2',],
					        'producer' => ['updproducer1',],
					        'actor' => ['udpactor1', 'udpactor2',],
					        'genre' => ['action', 'detective',],
					        ],
					        $status = 200);
    }

    public function deleteFilmStuff($id)
    {
        return $this->json('', $status = 204);
    }
}

?>