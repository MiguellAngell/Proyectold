<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PruebaController extends Controller
{
    /**
     * @Route(path="/prueba/{nombre}", name="ruta_prueba")
     */
    public function indexAction($nombre)
    {
        return $this->render('prueba/index.html.twig', ['dato' => $nombre, 'numero' => 34, 'dia' => ['lunes', 'martes', 'miercoles', 'jueves', 'viernes']]);
    }


    /**
     * @Route(path="/suma/{n1}/{n2}", name="suma_numeros")
     */
    public function sumaAction($n1, $n2)
    {
        return $this->render('suma1/index.html.twig', ['n1' => $n1, 'n2' => $n2]);
    }
}