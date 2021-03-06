<?php

namespace MusicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cancion
 */
class Cancion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $cancion;

    /**
     * @var string
     */
    private $duracion;

    /**
     * @var string
     */
    private $disco;






    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $artista;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->artista = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function __toString()
    {
        return $this->getCancion();
    }





    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cancion
     *
     * @param string $cancion
     *
     * @return Cancion
     */
    public function setCancion($cancion)
    {
        $this->cancion = $cancion;

        return $this;
    }

    /**
     * Get cancion
     *
     * @return string
     */
    public function getCancion()
    {
        return $this->cancion;
    }

    /**
     * Set duracion
     *
     * @param string $duracion
     *
     * @return Cancion
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get duracion
     *
     * @return string
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set disco
     *
     * @param string $disco
     *
     * @return Cancion
     */
    public function setDisco($disco)
    {
        $this->disco = $disco;

        return $this;
    }

    /**
     * Get disco
     *
     * @return string
     */
    public function getDisco()
    {
        return $this->disco;
    }


    /**
     * Add artista
     *
     * @param \MusicaBundle\Entity\Artista $artista
     * @return Cancion
     */
    public function addArtista(\ManyToManyBundle\Entity\Artista $artista)
    {
        $artista->addCancion($this);
        $this->artista[] = $artista;

        return $this;
    }

    /**
     * Remove artista
     *
     * @param \MusicaBundle\Entity\Artista $artista
     */
    public function removeArtista(\ManyToManyBundle\Entity\Artista $artista)
    {
        $artista->removeCancion($this);
        $this->artista->removeElement($artista);
    }

    /**
     * Get artista
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArtista()
    {
        return $this->artista;
    }


}
