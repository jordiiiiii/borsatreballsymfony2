<?php

namespace App\Form;

use App\Entity\Candidat;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('cognom1')
            ->add('cognom2')
            ->add('telefon')
//            ->add('ofertes')
//            ->add('usuari')
            ->add('usuari', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
