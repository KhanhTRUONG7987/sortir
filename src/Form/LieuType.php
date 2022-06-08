<?php

namespace App\Form;

use App\Entity\Lieu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LieuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, [
            'attr' => [
        'class' => 'form-control'
    ]])
            ->add('rue', TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('latitude', EntityType::class, [
                'label' => 'Latitude: ',
                'class' => Lieu::class, 'choice_label' => 'latitude', 'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('longitude', EntityType::class, [
                'label' => 'Longitude: ',
                'class' => Lieu::class, 'choice_label' => 'longitude', 'mapped' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('villeLieux', EntityType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Enregistrer', SubmitType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Annuler', SubmitType::class, [
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
