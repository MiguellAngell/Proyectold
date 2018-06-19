<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="administrar")
 */

class Administrar
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="administrar")
     *
     * @var Usuario
     */
    private $usuario;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Enlace", inversedBy="administrar")
     *
     * @var Enlace
     */
    private $enlace;

    /**
     * @ORM\Column(type="date")
     *
     * @var \DateTime
     */
    private $fechaSubida;

    /**
     * @ORM\Column(type="date", nullable=true)
     *
     * @var \DateTime
     */
    private $fechaAceptacion;

    /**
     * @ORM\Column(type="date", nullable=true)
     *
     * @var \DateTime
     */
    private $fechaRechazo;

    /**
     * @ORM\Column(type="text")
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
     * @return Administrar
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * @return Enlace
     */
    public function getEnlace()
    {
        return $this->enlace;
    }

    /**
     * @param Enlace $enlace
     *
     * @return Administrar
     */
    public function setEnlace($enlace)
    {
        $this->enlace = $enlace;
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
     *
     * @return Administrar
     */
    public function setFechaSubida($fechaSubida)
    {
        $this->fechaSubida = $fechaSubida;
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
     *
     * @return Administrar
     */
    public function setFechaAceptacion($fechaAceptacion)
    {
        $this->fechaAceptacion = $fechaAceptacion;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFechaRechazo()
    {
        return $this->fechaRechazo;
    }

    /**
     * @param \DateTime $fechaRechazo
     *
     * @return Administrar
     */
    public function setFechaRechazo($fechaRechazo)
    {
        $this->fechaRechazo = $fechaRechazo;
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
     * @return Administrar
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
        return $this;
    }



}