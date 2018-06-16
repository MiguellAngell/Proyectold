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
    private $idUsuario;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="gestiona")
     *
     * @var Categoria
     */
    private $idCategoria;

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
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param Usuario $idUsuario
     *
     * @return Gestiona
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
        return $this;
    }

    /**
     * @return Categoria
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * @param Categoria $idCategoria
     *
     * @return Gestiona
     */
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;
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