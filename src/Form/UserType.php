<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Candidat;
use App\Entity\Empresa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            // ->add('roles')
            ->add('password', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            // ->add('candidat')
            // ->add('empresa')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
