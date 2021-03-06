<?php

namespace MusicaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artista
 */
class Artista
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $anio;

    /**
     * @var string
     */
    private $genero;



        /**
         * @var \Doctrine\Common\Collections\Collection
         */
        private $cancion;

        /**
         * Constructor
         */
        public function __construct()
        {
            $this->cancion = new \Doctrine\Common\Collections\ArrayCollection();
        }
        public function __toString()
        {
            return $this->getNombre();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Artista
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set anio
     *
     * @param string $anio
     *
     * @return Artista
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;

        return $this;
    }

    /**
     * Get anio
     *
     * @return string
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Set genero
     *
     * @param string $genero
     *
     * @return Artista
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get genero
     *
     * @return string
     */
    public function getGenero()
    {
        return $this->genero;
    }




    /**
     * Add cancion
     *
     * @param \MusicaBundle\Entity\Cancion $cancion
     * @return Artista
     */
    public function addCancion(\MusicaBundle\Entity\Cancion $cancion)
    {
        $this->cancion[] = $cancion;
        return $this;
    }

    /**
     * Remove cancion
     *
     * @param \MusicaBundle\Entity\Cancion $cancion
     */
    public function removeCancion(\CancionBundle\Entity\Cancion $cancion)
    {
        $this->cancion->removeElement($cancion);
    }

    /**
     * Get cancion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCancion()
    {
        return $this->cancion;
    }


}
