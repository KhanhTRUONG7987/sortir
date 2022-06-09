<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AfficherParticipantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                //'class' => User::class,
                //'choice_label' => 'nom',
                // 'mapped' => false,
                'label' => 'Nom :',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('prenom', TextType::class, [
                //'class' => User::class,
                //'choice_label' => 'prenom',
                //'mapped' => false,
                'label' => 'Prénom :',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('telephone', TextType::class, [
                //'class' => User::class,
                //'choice_label' => 'telephone',
                //'mapped' => false,
                'label' => 'Téléphone :',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('email', EmailType::class, [

                'label' => 'Email :',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]


            ])
            ->add('estRattache', EntityType::class, [

                'label' => 'Campus :',
                'choice_label' => "nom",
                'class' => Campus::class,
                'attr' => [
                    'class' => 'form-control'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
