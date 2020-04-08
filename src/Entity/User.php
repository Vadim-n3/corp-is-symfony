<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AccessToken", mappedBy="user_id", cascade={"persist", "remove"})
     */
    private $access_token_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAccessTokenId(): ?AccessToken
    {
        return $this->access_token_id;
    }

    public function setAccessTokenId(AccessToken $access_token_id): self
    {
        $this->access_token_id = $access_token_id;

        // set the owning side of the relation if necessary
        if ($access_token_id->getUserId() !== $this) {
            $access_token_id->setUserId($this);
        }

        return $this;
    }
}
