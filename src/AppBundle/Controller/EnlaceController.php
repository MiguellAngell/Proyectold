<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Enlace;
use AppBundle\Entity\Usuario;
use AppBundle\Form\Type\EnlaceType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/enlace/eliminar/{id}", name="enlace_eliminar")
     */
    public function eliminarAction(Request $request, Enlace $enlace)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {
            try {
                // Entidades que dependan de enlace a eliminar
                // foreach($enlace->getEntidadEjemplo() as $EntidadEjemplo) {
                //    $em->remove($EntidadEjemplo);
                // };

                $em->remove($enlace);
                $em->flush();
                return $this->redirectToRoute('enlaces_listar');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se ha podido eliminar el enlace');
            }
        }

        return $this->render('enlace/eliminar.html.twig', [
            'enlace' => $enlace
        ]);
    }


    /**
     * @Route("/enlace/nuevo", name="enlace_nuevo")
     */
    public function nuevaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $enlace = new Enlace();
        $em->persist($enlace);

        $form = $this->createForm(EnlaceType::class, $enlace);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                return $this->redirectToRoute('enlace_listar');
            }
            catch (\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }

        return $this->render('enlace/form.html.twig', [
            'enlace' => $enlace,
            'formulario' => $form->createView()
        ]);
    }

    /**
     * @Route("/enlaces/{id}", name="enlaces_mostrar")
     */
    public function mostrarAction(Request $request,Enlace $enlace)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(EnlaceType::class, $enlace);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        try {
            $em->flush();
        } catch (\Exception $e) {
            $this->addFlash('error', 'No se han podido guardar los cambios');
        }
    }
        return $this->render('enlace/form.html.twig', [
            'enlace' => $enlace,
            'formulario' => $form->createView()
        ]);
    }


}
