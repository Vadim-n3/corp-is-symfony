<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenreRepository")
 */
class Genre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name_genre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameGenre(): ?string
    {
        return $this->name_genre;
    }

    public function setNameGenre(?string $name_genre): self
    {
        $this->name_genre = $name_genre;

        return $this;
    }
}
