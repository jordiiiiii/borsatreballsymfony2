<?php

namespace App\Form;

use App\Entity\Oferta;
use App\Entity\Categoria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OfertaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titol')
            ->add('descripcio')
//            ->add('dataPublicacio')
            ->add('ubicacio')
            ->add('estat')
//            ->add('empresa')
//            ->add('candidats')
//            ->add('categoria')
            ->add('categoria', EntityType::class, [
                'class' => Categoria::class,
                'choice_label' => 'descripcio'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Oferta::class,
        ]);
    }
}
