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
    private $idUsuario;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Enlace", inversedBy="administrar")
     *
     * @var Enlace
     */
    private $idEnlace;

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
     *
     * @var string
     */
    private $observaciones;

    /// ------------- ///

    /**
     * @return Usuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param Usuario $idUsuario
     *
     * @return Administrar
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
        return $this;
    }

    /**
     * @return Enlace
     */
    public function getIdEnlace()
    {
        return $this->idEnlace;
    }

    /**
     * @param Enlace $idEnlace
     *
     * @return Administrar
     */
    public function setIdEnlace($idEnlace)
    {
        $this->idEnlace = $idEnlace;
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

    /**
     * @return \DateTime
     */
    public function getFechaSubida()
    {
        return $this->fechaSubida;
    }

    /**
     * @param \DateTime $fechaSubida
     * @return Administrar
     */
    public function setFechaSubida($fechaSubida)
    {
        $this->fechaSubida = $fechaSubida;
        return $this;
    }



}