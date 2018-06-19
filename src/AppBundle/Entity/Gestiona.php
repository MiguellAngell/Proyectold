<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="gestiona")
 */
class Gestiona
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="gestiona")
     *
     * @var Usuario
     */
    private $usuario;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="gestiona")
     *
     * @var Categoria
     */
    private $categoria;

    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    private $numeroCambios;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    private $ultimaModificacion;

    /**
     * @ORM\Column(type="text")
     *
     * @var string
     */
    private $observaciones;

    /// ------------- ///

    /**
     * @return Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param Usuario $usuario
     *
     * @return Gestiona
     */
    public function setIdUsuario($usuario)
    {
        $this->usuario = $usuario;
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
     *
     * @return Gestiona
     */
    public function setIdCategoria($categoria)
    {
        $this->categoria = $categoria;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumeroCambios()
    {
        return $this->numeroCambios;
    }

    /**
     * @param int $numeroCambios
     *
     * @return Gestiona
     */
    public function setNumeroCambios($numeroCambios)
    {
        $this->numeroCambios = $numeroCambios;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUltimaModificacion()
    {
        return $this->ultimaModificacion;
    }

    /**
     * @param \DateTime $ultimaModificacion
     *
     * @return Gestiona
     */
    public function setUltimaModificacion($ultimaModificacion)
    {
        $this->ultimaModificacion = $ultimaModificacion;
        return $this;
    }

    /**
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param string $observaciones
     *
     * @return Gestiona
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
        return $this;
    }


}