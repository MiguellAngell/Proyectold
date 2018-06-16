<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EnlaceController extends Controller
{
    /**
     * @Route("/enlaces", name="enlaces_listar")
     */

    public function listarAction()
    {
        $enlaces = $this->getEnlaces();

        return $this->render('enlace/enlace.html.twig',[
        'enlace' => $enlaces
        ]);
    }

    /**
     * @Route("/enlaces/{id}", name="enlaces_mostrar")
     */
    public function mostrarAction($id)
    {
        $enlaces = $this->getEnlaces();

        if (!isset($enlaces[$id])) {
            throw $this->createNotFoundException();
        }

        return $this->render('enlace/mostrar.html.twig', [
            'enlace' => $enlaces[$id]
        ]);
    }

    private function getEnlaces(){
        return [
            1 => ['id' => 1,'titulo' => 'enlace google', 'descripcion' => 'google', 'autor' => 'alumno1', 'fecha_propuesta' => new \DateTime('2018-3-3')],
            3 =>['id' => 3,'titulo' => 'enlace youtube', 'descripcion' => 'youtube', 'autor' => 'alumno2', 'fecha_propuesta' => new \DateTime('2018-3-4')],
            6 => ['id' => 6,'titulo' => 'enlace el mundo', 'descripcion' => 'elmundo', 'autor' => 'alumno3', 'fecha_propuesta' => new \DateTime('2018-3-5')]
        ];
    }
}
