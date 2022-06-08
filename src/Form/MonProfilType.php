<?php

namespace App\Form;

use App\Entity\Campus;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MonProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom :',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('prenom', TextType::class, [
                'label' => 'Prénom :',
                'required' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('telephone', TextType::class, [
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

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de passe ne correspond pas.',
                'options' => ['attr' => ['class' => 'password']],
                'required' => false,
                'mapped'=>false,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmation du mot de passe',
                    'attr' => [
                        'class' => 'form-control'
                    ]
                ],
            ])



            ->add('estRattache', EntityType::class, [

                'label' => 'Campus :',
                'choice_label'=> "nom",
                'class' => Campus::class,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => [
                    'class' => 'btn btn-primary',
                ]
            ])



        ;

    }




    public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([

            ]);
        }

}
