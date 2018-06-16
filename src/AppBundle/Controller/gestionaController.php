<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Administrar;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class gestionaController extends Controller
{
    /**
     * @Route("/gestiona", name="gestiona_listar")
     */
    public function listarAction()
    {
        $gestiona = $this->getDoctrine()->getRepository('AppBundle:Gestiona')->findAll();

        return $this->render('gestiona/gestiona.html.twig', [
            'gestiona' => $gestiona
        ]);
    }
}
