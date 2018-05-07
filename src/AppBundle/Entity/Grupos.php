<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\OneToMany(targetEntity="Usuario", mappedBy="grupos")
     *
     * @var Collection|Enlace[]
     */

    private $usuarios;

}