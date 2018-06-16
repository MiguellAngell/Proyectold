<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsuarioController extends Controller
{
    /**
     * @Route("/usuarios", name="usuarios_listar")
     */

    public function listarAction()
    {
        $usuarios = $this->getUsuarios();

        return $this->render('usuario/usuario.html.twig',[
        'usuario' => $usuarios
        ]);
    }

    /**
     * @Route("/usuarios/{id}", name="usuarios_mostrar")
     */
    public function mostrarAction($id)
    {
        $usuarios = $this->getUsuarios();

        if (!isset($usuarios[$id])) {
            throw $this->createNotFoundException();
        }

        return $this->render('usuario/mostrar.html.twig', [
            'usuario' => $usuarios[$id]
        ]);
    }

    private function getUsuarios(){
        return [
            4 => ['id' => 4,'nombre' => 'alumno1', 'apellidos' => 'ap1 ap2', 'nombre_usuario' => 'nombre1'],
            8 =>['id' => 8,'nombre' => 'alumno2', 'apellidos' => 'ap1 ap2', 'nombre_usuario' => 'nombre2'],
            9 => ['id' => 9,'nombre' => 'alumno3', 'apellidos' => 'ap1 ap2', 'nombre_usuario' => 'nombre3']
        ];
    }
}
