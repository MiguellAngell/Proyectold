<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="enlace")
 */
class Enlace
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario", inversedBy="enlacesSubidos")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Usuario
     */
    private $autor;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    private $fechaSubida;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categoria", inversedBy="totalEnlaces")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Categoria
     */
    private $categoriaEnlace;

    /// ------------ ///

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Enlace
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return Enlace
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param Usuario $autor
     * @return Enlace
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFechaSubida()
    {
        return $this->fechaSubida;
    }

    /**
     * @param \DateTime $fechaSubida
     * @return Enlace
     */
    public function setFechaSubida($fechaSubida)
    {
        $this->fechaSubida = $fechaSubida;
        return $this;
    }

    /**
     * @return string
     */
    public function getcategoriaEnlace()
    {
        return $this->categoriaEnlace;
    }

    /**
     * @param Usuario $categoriaEnlace
     * @return Enlace
     */
    public function setcategoriaEnlace($categoriaEnlace)
    {
        $this->autor = $categoriaEnlace;
        return $this;
    }



}

