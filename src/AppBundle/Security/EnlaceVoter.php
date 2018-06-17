<?php

namespace AppBundle\Security;


use AppBundle\Entity\Enlace;
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class EnlaceVoter extends Voter
{
    const VER = 'ENLACE_VER';
    const MODIFICAR = 'ENLACE_MODIFICAR';
    const APROBAR = 'ENLACE_APROBAR';
    const RECHAZAR = 'ENLACE_RECHAZAR';
    const ELIMINAR = 'ENLACE_ELIMINAR';

    private $decisionManager;

    public function __construct(AccessDecisionManagerInterface $decisionManager)
    {
        $this->decisionManager = $decisionManager;
    }

    /**
     * {@inheritdoc}
     */
    protected function supports($attribute, $subject)
    {
        // indicar si el Voter soporta el atributo y el sujeto indicados

        // si el sujeto no es un enlace, devolver false
        if (!$subject instanceof Enlace) {
            return false;
        }

        // si no es uno de los atributos definidos arriba, devolver false
        if (!in_array($attribute, [self::VER, self::MODIFICAR, self::APROBAR, self::RECHAZAR, self::ELIMINAR], true)) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        // si estamos aquí, es seguro que el sujeto es un enlace y el atributo uno de los definidos arriba

        $user = $token->getUser();

        if (!$user instanceof Usuario) {
            // debería haber un usuario activo en la aplicación, denegar si no es así
            return false;
        }

        // si el usuario tiene ROLE_ADMIN, siempre tiene permiso
        if ($this->decisionManager->decide($token, ['ROLE_ADMIN'])) {
            return true;
        }

        switch ($attribute) {
            case self::VER:
                return $this->puedeVer($subject, $token, $user);
            case self::MODIFICAR:
                return $this->puedeModificar($subject, $token, $user);
            case self::APROBAR:
                return $this->puedeAprobar($subject, $token, $user);
            case self::RECHAZAR:
                return $this->puedeRechazar($subject, $token, $user);
            case self::ELIMINAR:
                return $this->puedeEliminar($subject, $token, $user);
        }

        // por defecto, denegar el permiso
        return false;
    }

    private function puedeVer(Enlace $enlace, TokenInterface $token, Usuario $user)
    {
        // todos pueden ver los enlaces publicadas
        return true;
    }

    private function puedeAprobar(Enlace $enlace, TokenInterface $token, Usuario $user)
    {
        // solo los moderadores pueden aprobar o denegar un enlace
        return $this->decisionManager->decide($token, ['ROLE_MODERADOR']);
    }

    private function puedeRechazar(Enlace $enlace, TokenInterface $token, Usuario $user)
    {
        // solo los moderadores pueden aprobar o denegar una enlace
        return $this->puedeAprobar($enlace, $token, $user);
    }

    private function puedeModificar(Enlace $enlace, TokenInterface $token, Usuario $user)
    {
        // solo el propietario y un administrador pueden modificar un enlace

        if ($enlace->getAutor() === $user) {
            // es el autor
            return true;
        }

        return $this->decisionManager->decide($token, ['ROLE_ADMIN']);
    }

    private function puedeEliminar(Enlace $enlace, TokenInterface $token, Usuario $user)
    {
        // solo el propietario y un gestor pueden eliminar un enlace

        if ($enlace->getAutor() === $user) {
            // es el autor
            return true;
        }

        return $this->decisionManager->decide($token, ['ROLE_GESTOR']);
    }
}
