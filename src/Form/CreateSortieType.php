<?php

namespace App\Form;

use App\Entity\Sortie;
use App\Entity\Ville;
use App\Entity\Campus;
use App\Entity\Lieu;
use Doctrine\DBAL\Types\DateType;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateSortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')

            ->add('dateHeureDebut')

            ->add('dateLimiteInscription', /*DateType::class,[
                'label' => 'Date limite d\'inscription',
                'widget' => 'single_text',
            ]*/)

            ->add('nbinscriptionsMax')
            ->add('duree')
            ->add('infosSortie')

            ->add('campus',EntityType::class, [
                'class' => Campus::class, 'choice_label' => 'nom', 'mapped'=>false,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('ville',EntityType::class, [
                'class' => Ville::class, 'choice_label' => 'nom', 'mapped'=>false,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('lieuxSorties',EntityType::class, [
                'class' => Lieu::class, 'choice_label' => 'rue', 'mapped'=>false,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])

            ->add('rue',EntityType::class, [
                'class' => Lieu::class, 'choice_label' => 'rue', 'mapped'=>false,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])

            ->add('codePostal',EntityType::class, [
                'class' => Ville::class, 'choice_label' => 'codePostal', 'mapped'=>false,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])

            ->add('latitude',EntityType::class, [
                'class' => Lieu::class, 'choice_label' => 'latitude', 'mapped'=>false,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])

            ->add('longitude',EntityType::class, [
                'class' => Lieu::class, 'choice_label' => 'longitude', 'mapped'=>false,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])

            ->add('Enregistrer', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                ]
            ])

            ->add('Publier', SubmitType::class,['attr' => [
                'class' => 'btn btn-success',
            ]
            ])

            ->add('Annuler', SubmitType::class,[
                'attr' => [
                    'class' => 'btn btn-warning',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
