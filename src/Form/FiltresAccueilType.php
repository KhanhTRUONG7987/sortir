<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Sortie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiltresAccueilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('campus', EntityType::class, [
                'label' => 'Campus',
                'choice_label' => "nom",
                'class' => Campus::class
            ])

            ->add('motcles', SearchType::class, [
                'label' => 'Nom de la sortie contient',
                'required' => false

            ])

            ->add('campus', EntityType::class, [
                'label' => 'Campus',
                'choice_label' => "nom",
                'class' => Campus::class
            ])


        ;
    }



    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
