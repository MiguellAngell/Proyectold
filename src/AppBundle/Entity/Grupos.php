<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="grupos")
 */
class Grupos
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
    private $nombreAdmin;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $descripcion;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $totalMiembros;

    /**
     * @ORM\ManyToMany(targetEntity="Usuario",mappedBy="grupos")
     *
     * @var Collection|Usuario[]
     */
    private $usuarios;

    /**
     * @ORM\OneToOne(targetEntity="Categoria", inversedBy="grupo")
     *
     * @var Categoria
     */
    private $categoria;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Grupos
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombreAdmin()
    {
        return $this->nombreAdmin;
    }

    /**
     * @param string $nombreAdmin
     * @return Grupos
     */
    public function setNombreAdmin($nombreAdmin)
    {
        $this->nombreAdmin = $nombreAdmin;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * @param \DateTime $fechaCreacion
     * @return Grupos
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
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
     * @return Grupos
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalMiembros()
    {
        return $this->totalMiembros;
    }

    /**
     * @param int $totalMiembros
     * @return Grupos
     */
    public function setTotalMiembros($totalMiembros)
    {
        $this->totalMiembros = $totalMiembros;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    /**
     * @param Usuario $usuarios
     * @return Grupos
     */
    public function addUsuarios(Usuario $usuarios)
    {
        if (!$this->usuarios->contains($usuarios)){
            $this->usuarios->add($usuarios);
        }
        return $this;
    }

    /**
     * @param Usuario $usuarios
     * @return Grupos
     */
    public function removeUsuarios(Usuario $usuarios)
    {
        if ($this->usuarios->contains($usuarios)){
            $this->usuarios->removeElement($usuarios);
        }

        return $this;
    }



    /**
     * @return Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param Categoria $categoria
     * @return Grupos
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
        return $this;
    }

}