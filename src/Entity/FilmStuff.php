<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmStuffRepository")
 */
class FilmStuff
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $author = [];

    /**
     * @ORM\Column(type="array")
     */
    private $director = [];

    /**
     * @ORM\Column(type="array")
     */
    private $producer = [];

    /**
     * @ORM\Column(type="array")
     */
    private $actor = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?array
    {
        return $this->author;
    }

    public function setAuthor(array $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getDirector(): ?array
    {
        return $this->director;
    }

    public function setDirector(array $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getProducer(): ?array
    {
        return $this->producer;
    }

    public function setProducer(array $producer): self
    {
        $this->producer = $producer;

        return $this;
    }

    public function getActor(): ?array
    {
        return $this->actor;
    }

    public function setActor(array $actor): self
    {
        $this->actor = $actor;

        return $this;
    }
}
