<?php

namespace App\Form;

use App\Entity\Registres;
use App\Entity\Oferta;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RegistresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('correu')
            ->add('ip')
            ->add('data')
            ->add('nom')
            ->add('cognom1')
            ->add('cognom2')
//            ->add('oferta_id')
            ->add('oferta_id', EntityType::class, [
                'class' => Oferta::class,
                'choice_label' => 'id'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Registres::class,
        ]);
    }
}
