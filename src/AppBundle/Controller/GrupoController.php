<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Grupos;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GrupoController extends Controller
{
    /**
     * @Route("/grupos", name="grupos_listar")
     */
    public function listarAction()
    {
        $grupos = $this->getDoctrine()->getRepository('AppBundle:Grupos')->findAll();

        return $this->render('grupo/grupo.html.twig', [
            'grupos' => $grupos
        ]);
    }

    /**
     * @Route("/grupos/{id}", name="grupos_mostrar")
     */
    public function mostrarAction(Grupos $grupo)
    {

        return $this->render('grupo/mostrar.html.twig', [
            'grupos' => $grupo
        ]);
    }
}
