<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AuthController extends AbstractController
{
	public function registration()
    {
        return $this->json('', $status = 201);
    }

    public function getToken()
    {
        return $this->json(['access_token' => 'a4z4XoChBtHFGyMVrebwgnVcUnDEFc', 
        			'token_type' => 'Bearer', 
        			'expires_in' => 36000, 
        			'refresh_token' => 'ea9sPsCPyRScREoDVl95MkQPiCF1T5',
        			], 
        			$status = 200);
    }
}

?>