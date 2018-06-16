<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categoria;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoriaController extends Controller
{
    /**
     * @Route("/categorias", name="categorias_listar")
     */
    public function listarAction()
    {
        $categorias = $this->getDoctrine()->getRepository('AppBundle:Categoria')->findAll();

        return $this->render('categoria/categoria.html.twig', [
            'categorias' => $categorias
        ]);
    }

    /**
     * @Route("/categorias/{id}", name="categorias_mostrar")
     */
    public function mostrarAction(Categoria $categoria)
    {
        return $this->render('categoria/mostrar.html.twig', [
            'categorias' => $categoria
        ]);
    }
}
