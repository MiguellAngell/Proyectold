<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Grupos;
use AppBundle\Form\Type\GruposType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/grupos/eliminar/{id}", name="grupos_eliminar")
     */
    public function eliminarAction(Request $request, Grupos $grupos)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {
            try {
                // Entidades que dependan de enlace a eliminar
                // foreach($enlace->getEntidadEjemplo() as $EntidadEjemplo) {
                //    $em->remove($EntidadEjemplo);
                // };

                $em->remove($grupos);
                $em->flush();
                return $this->redirectToRoute('grupos_listar');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se ha podido eliminar el grupo');
            }
        }

        return $this->render('grupo/eliminar.html.twig', [
            'grupos' => $grupos
        ]);
    }


    /**
     * @Route("/grupos/nuevo", name="grupos_nuevo")
     */
    public function nuevaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $grupos = new Grupos();
        $em->persist($grupos);

        $form = $this->createForm(GruposType::class, $grupos);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                return $this->redirectToRoute('grupos_listar');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }

        return $this->render('grupo/form.html.twig', [
            'grupos' => $grupos,
            'formulario' => $form->createView()
        ]);
    }

    /**
     * @Route("/grupos/{id}", name="grupos_mostrar")
     */
    public function mostrarAction(Request $request,Grupos $grupos)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(GruposType::class, $grupos);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
            } catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }
        return $this->render('grupo/form.html.twig', [
            'grupos' => $grupos,
            'formulario' => $form->createView()
        ]);
    }


}
