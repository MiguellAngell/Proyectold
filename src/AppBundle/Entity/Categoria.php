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
     * @ORM\Column(type="text")
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
     * @ORM\Column(type="date", nullable=true)
     *
     * @var \DateTime
     */
    private $fechaAceptacion;

    /**
     * @ORM\OneToMany(targetEntity="Enlace", mappedBy="categoria")
     *
     * @var Collection|Enlace[]
     */
    private $enlaces;

    /**
     * @ORM\OneToMany(targetEntity="Gestiona", mappedBy="categoria")
     *
     * @var Collection|Gestiona[]
     */
    private $gestiona;

    /**
     * @ORM\OneToOne(targetEntity="Grupos",inversedBy="categoria")
     *
     * @var Grupos
     */
    private $grupo;

    public function __construct()
    {
        $this->enlaces = new ArrayCollection();
        $this->gestiona = new ArrayCollection();
    }


    /// Convertir en una cadena

    public function __toString()
    {
        return $this->getNombreCategoria();
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
        return $this->aprobada;
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
     * @return Collection
     */
    public function getEnlaces()
    {
        return $this->enlaces;
    }

    /**
     * @param Enlace $enlaces
     * @return Categoria
     */
    public function addEnlaces(Enlace $enlaces)
    {
        if (!$this->enlaces->contains($enlaces)) {
            $this->enlaces->add($enlaces);
        }
        return $this;
    }

    /**
     * @param Enlace $enlaces
     * @return Categoria
     */
    public function removeEnlaces(Enlace $enlaces)
    {
        $this->enlaces->removeElement($enlaces);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getGestiona()
    {
        return $this->gestiona;
    }

    /**
     * @param Gestiona $gestiona
     * @return Categoria
     */
    public function addGestiona(Gestiona $gestiona)
    {
        if (!$this->gestiona->contains($gestiona)) {
            $this->gestiona->add($gestiona);
        }
        return $this;
    }
    /**
     * @param Gestiona $gestiona
     * @return Categoria
     */
    public function removeGestiona(Gestiona $gestiona)
    {
        $this->gestiona->removeElement($gestiona);
        return $this;
    }

    /**
     * @return Grupos
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * @param Grupos $grupo
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
    }



}