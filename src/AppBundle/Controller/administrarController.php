<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Administrar;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class administrarController extends Controller
{
    /**
     * @Route("/administrar", name="administrar_listar")
     */
    public function listarAction()
    {
        $administrar = $this->getDoctrine()->getRepository('AppBundle:Administrar')->findAll();

        return $this->render('administrar/administrar.html.twig', [
            'administrar' => $administrar
        ]);
    }
}
