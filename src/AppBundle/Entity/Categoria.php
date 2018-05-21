<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="categoria")
 */

class Categoria
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $nombreCategoria;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $descripcion;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var boolean
     */
    private $aprobada;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    private $fechaAceptacion;

    /**
     * @ORM\OneToMany(targetEntity="Enlace", mappedBy="$categoriaEnlace")
     *
     * @var Collection|Enlace[]
     */
    private $totalEnlaces;

    /**
     * @ORM\OneToMany(targetEntity="Gestiona", mappedBy="idCategoria")
     *
     * @var Collection|Gestiona[]
     */
    private $gestiona;

    /**
     * @ORM\OneToOne(targetEntity="Grupos"),mappedBy="categoria")
     *
     * @var Grupos
     */
    private $grupo;

    public function __construct()
    {
        $this->totalEnlaces = new ArrayCollection();
        $this->gestiona = new ArrayCollection();
    }

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
    public function getNombreCategoria()
    {
        return $this->nombreCategoria;
    }

    /**
     * @param string $nombreCategoria
     * @return Categoria
     */
    public function setNombreCategoria($nombreCategoria)
    {
        $this->nombreCategoria = $nombreCategoria;
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
     * @return Categoria
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getAprobada()
    {
        return $this->descripcion;
    }

    /**
     * @param boolean $aprobada
     * @return Categoria
     */
    public function setAprobada($aprobada)
    {
        $this->aprobada = $aprobada;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFechaAceptacion()
    {
        return $this->fechaAceptacion;
    }

    /**
     * @param \DateTime $fechaAceptacion
     * @return Categoria
     */
    public function setFechaAceptacion($fechaAceptacion)
    {
        $this->fechaAceptacion = $fechaAceptacion;
        return $this;
    }

    /**
     * @return Collection|Enlace[]
     */
    public function getTotalEnlaces()
    {
        return $this->totalEnlaces;
    }

    /**
     * @param int $totalEnlaces
     * @return Categoria
     */
    public function setTotalEnlaces($totalEnlaces)
    {
        $this->totalEnlaces = $totalEnlaces;
        return $this;
    }

}