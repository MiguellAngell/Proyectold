<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Enlace;
use Symfony\Component\Form\AbstractType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class EnlaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null, [
              'label' => 'Nombre enlace'
                 ])
            ->add('descripcion',null,[
                'label' => 'Descripcion'
                ])
            ->add('autor',null,[
                'label' => 'Autor'
            ])
            ->add('categoriaEnlace', null, [
                'label' => 'Categorias',
                'expanded' => true,
                'required' => false
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Enlace::class,
        ]);
    }
}
