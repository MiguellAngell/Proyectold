<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsuarioController extends Controller
{
    /**
     * @Route("/usuarios", name="usuarios_listar")
     */
    public function listarAction()
    {
        $usuarios = $this->getDoctrine()->getRepository('AppBundle:Usuario')->findAll();

        return $this->render('usuario/usuario.html.twig', [
            'usuario' => $usuarios
        ]);
    }

    /**
     * @Route("/usuarios/{id}", name="usuarios_mostrar", requirements={"id": "\d+"})
     */
    public function mostrarAction(Usuario $usuario)
    {

        return $this->render('usuario/mostrar.html.twig', [
            'usuario' => $usuario
        ]);
    }
}
