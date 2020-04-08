<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Entity\AccessToken;
use Doctrine\ORM\EntityManagerInterface;

class AuthController extends AbstractController
{
	public function registration()
    {
        $request = Request::createFromGlobals();
        $data = json_decode($request->getContent());
        $username = $data->username;
        $password = $data->password;  

        $entityManager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setUsername($link);
        $user->setPassword($link);

        $entityManager->persist($user);

        $entityManager->flush();

        return $this->json('', $status = 201);
    }

    public function getToken()
    {
        $request = Request::createFromGlobals();
        $data = json_decode($request->getContent());
        $username = $data->username;
        // password comparison is needed here
        // and access token generator also
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->findBy(['username' => $username]);

        return $this->json([$user->getAccessTokenId()], $status = 200);
    }
}

?>