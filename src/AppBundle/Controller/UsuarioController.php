<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\Type\CambioClaveType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;


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


    /**
     * @Route("/usuario/clave", name="usuario_cambiar_clave")
     * @Security("is_granted('ROLE_USER')")
     */
    public function cambiarClave(Request $request, UserPasswordEncoder $userPasswordEncoder)
    {
        /** @var Usuario $usuario */
        $usuario = $this->getUser();

        $formulario = $this->createForm(CambioClaveType::class, $usuario);

        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {
            $textoPlano = $formulario->get('nuevaClave')->get('first')->getData();

            try {
                $usuario->setPassword(
                    $userPasswordEncoder->encodePassword($usuario, $textoPlano)
                );
                $this->getDoctrine()->getManager()->flush();
                $this->addFlash('info', 'Contraseña cambiada con éxito');

                return $this->redirectToRoute('inicio');
            }
            catch(\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }
        }

        return $this->render('usuario/cambio_clave.html.twig', [
            'formulario' => $formulario->createView()
        ]);
    }
}
