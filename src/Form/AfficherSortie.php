<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Sortie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AfficherSortie extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom :',
                'required' => false
            ])

            ->add('dateHeureDebut', TextType::class, [
                'label' => 'date et Heure de la Sortie :',
                'required' => false
            ])

            ->add('dateLimiteInscription', TextType::class, [
                'label' => 'date Limite d\'Inscription :',
                'required' => false
            ])

            ->add('nbinscriptionsMax', TextType::class, [
                'label' => 'inscriptions Max :',
                'required' => false
            ])

            ->add('duree', PasswordType::class, [
                'label' => 'duree :',
                'required' => false
            ])
            ->add('infosSortie', TextType::class, [
                'label' => 'infosSortie :',
                'required' => false
            ])
            ->add('campus', TextType::class, [
                'label' => 'campus :',
                'required' => false
            ])
            ->add('lieuxSorties', TextType::class, [
                'label' => 'lieuxSorties :',
                'required' => false
            ])
            ->add('rue', TextType::class, [
                'label' => 'rue :',
                'required' => false
            ])
            ->add('codePostal', TextType::class, [
                'label' => 'codePostal :',
                'required' => false
            ])
            ->add('latitude', TextType::class, [
                'label' => 'latitude :',
                'required' => false
            ])
            ->add('longitude', TextType::class, [
                'label' => 'longitude :',
                'required' => false
            ])

            ->add('estRattache', EntityType::class, [
                'label' => 'Campus :',
                'choice_label'=> "nom",
                'class' => Campus::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([

            ]);
        }

}
