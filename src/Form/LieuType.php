<?php

namespace App\Form;

use App\Entity\Lieu;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LieuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, [
                'label' => 'Nom du lieu:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('rue',TextType::class, [
                'label' => 'Rue:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('latitude',TextType::class, [
                'label' => 'latitude:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('longitude',TextType::class, [
                'label' => 'longitude:',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('villeLieux',EntityType::class, [
                'label' => 'Ville: ',
                'class' => Ville::class, 'choice_label' => 'nom', 'mapped' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lieu::class,
        ]);
    }
}
