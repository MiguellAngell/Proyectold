<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class Usuario
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
    private $apellidos;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $nombreUsuario;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $password;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $correoElectronico;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $tipoUsuario;

    /**
     * @ORM\OneToMany(targetEntity="Enlace", mappedBy="autor")
     *
     * @var Collection|Enlace[]
     */
    private $enlacesSubidos;

    /**
     * @ORM\OneToMany(targetEntity="Gestiona", mappedBy="idUsuario")
     *
     * @var Collection|Gestiona[]
     */
    private $gestiona;

    /**
     * @ORM\OneToMany(targetEntity="Administrar", mappedBy="idUsuario")
     *
     * @var Collection|Administrar[]
     */
    private $administrar;


    /**
     * @ORM\ManyToMany(targetEntity="Grupos",inversedBy="usuarios")
     *
     * @var Collection|Grupos[]
     */
    private $grupos;

    public function __construct()
    {
        $this->enlacesSubidos = new ArrayCollection();
        $this->gestiona = new ArrayCollection();
        $this->administrar = new ArrayCollection();
        $this->grupos=new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNombre().' '.$this->getApellidos();
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
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * @param string $nombreUsuario
     * @return Usuario
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * @param string $correoElectronico
     * @return Usuario
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;
        return $this;
    }

    /**
     * @return string
     */
    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    /**
     * @param string $tipoUsuario
     * @return Usuario
     */
    public function setTipoUsuario($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
        return $this;
    }

    /**
     * @return Collection|Enlace[]
     */
    public function getEnlacesSubidos()
    {
        return $this->enlacesSubidos;
    }

    /**
     * @param Enlace $enlace
     * @return Usuario
     */
    public function addEnlacesSubidos(Enlace $enlace)
    {
        if (!$this->enlacesSubidos->contains($enlace)) {
            $this->enlacesSubidos->add($enlace);
        }

        return $this;
    }

    /**
     * @param Enlace $enlace
     * @return Usuario
     */
    public function removeEnlacesSubidos(Enlace $enlace)
    {
        if ($this->enlacesSubidos->contains($enlace)) {
            $this->enlacesSubidos->removeElement($enlace);
        }

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
     * @return Usuario
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
     * @return Usuario
     */
    public function removeGestiona(Gestiona $gestiona)
    {
        if ($this->gestiona->contains($gestiona)) {
            $this->gestiona->removeElement($gestiona);
        }
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
     * @return Usuario
     */
    public function addAdministrar(Administrar $administrar)
    {
        if (!$this->$administrar->contains($administrar)) {
            $this->$administrar->add($administrar);
        }
        return $this;
    }

    /**
     * @param Administrar $administrar
     * @return Usuario
     */
    public function removeAdministrar(Administrar $administrar)
    {
        if ($this->$administrar->contains($administrar)) {
            $this->$administrar->removeElement($administrar);
        }
        return $this;
    }

    /**
     * @return Collection
     */
    public function getGrupos()
    {
        return $this->grupos;
    }

    /**
     * @param Grupos $grupos
     * @return Usuario
     */
    public function addGrupos(Grupos $grupos)
    {
        if (!$this->$grupos->contains($grupos)) {
            $this->$grupos->add($grupos);
        }
        return $this;
    }


    /**
     * @param Grupos $grupos
     * @return Usuario
     */
    public function removeGrupos(Grupos $grupos)
    {
        if ($this->$grupos->contains($grupos)) {
            $this->$grupos->removeElement($grupos);
        }
        return $this;
    }




}