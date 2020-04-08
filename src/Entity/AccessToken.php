<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccessTokenRepository")
 */
class AccessToken
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\user", inversedBy="access_token_id", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $access_token;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $token_type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $expires_in;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $refresh_token;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?user
    {
        return $this->user_id;
    }

    public function setUserId(user $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getAccessToken(): ?string
    {
        return $this->access_token;
    }

    public function setAccessToken(?string $access_token): self
    {
        $this->access_token = $access_token;

        return $this;
    }

    public function getTokenType(): ?string
    {
        return $this->token_type;
    }

    public function setTokenType(?string $token_type): self
    {
        $this->token_type = $token_type;

        return $this;
    }

    public function getExpiresIn(): ?int
    {
        return $this->expires_in;
    }

    public function setExpiresIn(?int $expires_in): self
    {
        $this->expires_in = $expires_in;

        return $this;
    }

    public function getRefreshToken(): ?string
    {
        return $this->refresh_token;
    }

    public function setRefreshToken(?string $refresh_token): self
    {
        $this->refresh_token = $refresh_token;

        return $this;
    }
}
