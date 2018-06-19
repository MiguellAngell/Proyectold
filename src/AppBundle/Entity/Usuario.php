<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class Usuario implements UserInterface
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
    private $enlaces;

    /**
     * @ORM\OneToMany(targetEntity="Gestiona", mappedBy="usuario")
     *
     * @var Collection|Gestiona[]
     */
    private $gestiona;

    /**
     * @ORM\OneToMany(targetEntity="Administrar", mappedBy="usuario")
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
        $this->enlaces = new ArrayCollection();
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
    public function getEnlaces()
    {
        return $this->enlaces;
    }

    /**
     * @param Enlace $enlaces
     * @return Usuario
     */
    public function addEnlacesSubidos(Enlace $enlaces)
    {
        if (!$this->enlaces->contains($enlaces)) {
            $this->enlaces->add($enlaces);
        }

        return $this;
    }

    /**
     * @param Enlace $enlaces
     * @return Usuario
     */
    public function removeEnlacesSubidos(Enlace $enlaces)
    {
        if ($this->enlaces->contains($enlaces)) {
            $this->enlaces->removeElement($enlaces);
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
        if (!$this->administrar->contains($administrar)) {
            $this->administrar->add($administrar);
        }
        return $this;
    }

    /**
     * @param Administrar $administrar
     * @return Usuario
     */
    public function removeAdministrar(Administrar $administrar)
    {
        if ($this->administrar->contains($administrar)) {
            $this->administrar->removeElement($administrar);
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
        if (!$this->grupos->contains($grupos)) {
            $this->grupos->add($grupos);
        }
        return $this;
    }


    /**
     * @param Grupos $grupos
     * @return Usuario
     */
    public function removeGrupos(Grupos $grupos)
    {
        if ($this->grupos->contains($grupos)) {
            $this->grupos->removeElement($grupos);
        }
        return $this;
    }


    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        // inicialmente todos los usuarios tienen el rol ROLE_USER
        $roles = ['ROLE_USER'];

        // si es administrador, añadir el rol ROLE_ADMIN
        if ($this->getTipoUsuario()=="admin") {
            $roles[] = 'ROLE_ADMIN';
        }

        // si es moderador, añadir el rol ROLE_MODERADOR
        if ($this->getTipoUsuario()=="moredador") {
            $roles[] = 'ROLE_MODERADOR';
        }

        // si es seleccionador, añadir el rol ROLE_SELECCIONADOR
        if ($this->getTipoUsuario()=="gestor"){
            $roles[] = 'ROLE_GESTOR';
        }

        return $roles;
    }

    /** getPassword() estaba ya definido, así que no hace falta tocarlo */

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // no usamos sal para codificar las contraseñas
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getNombreUsuario();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // no hacer nada
    }



}