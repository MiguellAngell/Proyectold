<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ComparadorController extends Controller
{
    /**
     * @Route(path="/compara/{n1}/{n2}", name="compara_numeros")
     */

    public function comparaAction($n1, $n2)
    {
        return $this->render('compara/index.html.twig', ['n1' => $n1, 'n2' => $n2]);
    }
}
