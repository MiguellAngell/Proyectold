<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="text")
     *
     * @var string
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario", inversedBy="enlaces")
     * @ORM\JoinColumn(nullable=false)
     *
     * @var Usuario
     */
    private $autor;

    /**
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="enlaces")
     * @var Categoria
     */
    private $categoria;

    /**
     * @ORM\OneToMany(targetEntity="Administrar", mappedBy="enlace")
     *
     * @var Collection|Administrar[]
     */
    private $administrar;

    public function __construct()
    {
        $this->administrar = new ArrayCollection();
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
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param Usuario $categoria
     * @return Enlace
     */
    public function setCategoria($categoria)
    {
        $this->autor = $categoria;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getAdministrar()
    {
        return $this->administrar;
    }
    /**
     * @param Administrar $administrar
     * @return Enlace
     */
    public function addAdministrar(Administrar $administrar)
    {
        if (!$this->administrar->contains($administrar)) {
            $this->administrar->add($administrar);
        }
        return $this;
    }
    /**
     * @param Administrar $administrar
     * @return Enlace
     */
    public function removeAdministrar(Administrar $administrar)
    {
        $this->administrar->removeElement($administrar);
        return $this;
    }

}

