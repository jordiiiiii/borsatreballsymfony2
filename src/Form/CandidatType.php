<?php

namespace App\Form;

use App\Entity\Candidat;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\TextType;


class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('cognom1', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('cognom2', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('telefon', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
//            ->add('ofertes')
//            ->add('usuari')
//            ->add('usuari', EntityType::class, [
//                'class' => User::class,
//                'choice_label' => 'email'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
