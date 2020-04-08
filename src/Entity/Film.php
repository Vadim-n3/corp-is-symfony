<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmRepository")
 */
class Film
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
    private $link;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Gallery", cascade={"persist", "remove"})
     */
    private $id_gallery;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\FilmStuff", cascade={"persist", "remove"})
     */
    private $id_stuff;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Genre")
     */
    private $id_genre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getIdGallery(): ?gallery
    {
        return $this->id_gallery;
    }

    public function setIdGallery(?gallery $id_gallery): self
    {
        $this->id_gallery = $id_gallery;

        return $this;
    }

    public function getIdStuff(): ?FilmStuff
    {
        return $this->id_stuff;
    }

    public function setIdStuff(?FilmStuff $id_stuff): self
    {
        $this->id_stuff = $id_stuff;

        return $this;
    }

    public function getIdGenre(): ?genre
    {
        return $this->id_genre;
    }

    public function setIdGenre(?genre $id_genre): self
    {
        $this->id_genre = $id_genre;

        return $this;
    }
}
