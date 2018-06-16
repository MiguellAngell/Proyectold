<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Enlace;
use AppBundle\Entity\Usuario;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EnlaceController extends Controller
{
    /**
     * @Route("/enlaces", name="enlaces_listar")
     */
    public function listarAction()
    {
        $enlaces = $this->getDoctrine()->getRepository('AppBundle:Enlace')->findAll();

        return $this->render('enlace/enlace.html.twig', [
            'enlace' => $enlaces
        ]);
    }

    /**
     * @Route("/enlace/usuario/{id}", name="enlace_usuario_mostrar")
     */
    public function mostrarUsuarioAction(Usuario $usuario)
    {
        return $this->render('enlace/enlace_usuario.html.twig', [
            'usuario' => $usuario,
            'enlace' => $usuario->getEnlacesSubidos()
        ]);
    }



    /**
     * @Route("/enlaces/{id}", name="enlaces_mostrar")
     */
    public function mostrarAction(Enlace $enlace)
    {
        return $this->render('enlace/mostrar.html.twig', [
            'enlace' => $enlace
        ]);
    }
}
