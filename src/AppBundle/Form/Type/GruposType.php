<?php

namespace AppBundle\Form\Type;

use AppBundle\Controller\GrupoController;
use AppBundle\Entity\Grupos;
use AppBundle\Entity\Usuario;
use AppBundle\Entity\Categoria;
use Symfony\Component\Form\AbstractType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class GruposType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, [
              'label' => 'Nombre grupo'
                 ])
            ->add('nombreAdmin',null,[
                'label' => 'Administrador'
                ])
            ->add('fechaCreacion',null,[
                'label' => 'Fecha creacion',
                'widget' => 'single_text',
            ])
            ->add('descripcion',null,[
                'label' => 'Descripcion'
            ])
            ->add('totalMiembros',null,[
                'label' => 'Miembros totales'
            ])
            ->add('usuarios', EntityType::class, [
                'class' => Usuario::class,
                'label' => 'Usuarios',
                'expanded' => true,
                'multiple' => true,
                'required' => false
                ])
        ->add('categoria', EntityType::class, [
        'class' => Categoria::class,
        'label' => 'Categorias',
        'expanded' => true,
        'required' => false
    ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Grupos::class,
        ]);
    }
}
