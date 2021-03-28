<?php

namespace App\Form;

use App\Entity\Oferta;
use App\Entity\Categoria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

// use Symfony\Bridge\Doctrine\Form\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;



class OfertaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titol', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('descripcio', TextareaType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
//            ->add('dataPublicacio')
            ->add('ubicacio', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('estat', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
//            ->add('empresa')
//            ->add('candidats')
//            ->add('categoria')
            ->add('categoria', EntityType::class, array(
                'class' => Categoria::class,
                'choice_label' => 'descripcio',
                'attr' => array(
                    'class' => 'form-control'
                ))
            );
    
    
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Oferta::class,
        ]);
    }
}
