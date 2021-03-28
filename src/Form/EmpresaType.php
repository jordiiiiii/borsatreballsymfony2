<?php

namespace App\Form;

use App\Entity\Empresa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EmpresaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('tipus', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('logo', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('correu', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Empresa::class,
        ]);
    }
}
