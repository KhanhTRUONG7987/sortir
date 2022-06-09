<?php

namespace App\Form;

use App\Entity\Sortie;
use App\Entity\Ville;
use App\Entity\Campus;
use App\Entity\Lieu;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateSortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de la sortie:',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])

            ->add('dateHeureDebut', DateTimeType::class, [
                'label' => 'Date et heure de la sortie: ',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('dateLimiteInscription', DateType::class, [
                'label' => 'Date limite d\'inscription :',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('nbinscriptionsMax', NumberType::class, [
                'label' => 'Nombre de places:  ',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('duree', NumberType::class, [
                'label' => 'Durée:',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('infosSortie', TextareaType::class, [
                'label' => 'Description et infos: ',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('sortieOrganisee', EntityType::class, [
                'label' => 'Campus: ',
                'class' => Campus::class, 'choice_label' => 'nom', 'mapped' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('ville', EntityType::class, [
                'label' => 'Ville: ',
                'class' => Ville::class, 'choice_label' => 'nom', 'mapped' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('lieuxSorties', EntityType::class, [
                'label' => 'Lieu: ',
                'class' => Lieu::class, 'choice_label' => 'rue', 'mapped' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('rue', EntityType::class, [
                'label' => 'Rue: ',
                'class' => Lieu::class, 'choice_label' => 'rue', 'mapped' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('codePostal', EntityType::class, [
                'label' => 'Code postal: ',
                'class' => Ville::class, 'choice_label' => 'codePostal', 'mapped' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('latitude', EntityType::class, [
                'label' => 'Latitude: ',
                'class' => Lieu::class, 'choice_label' => 'latitude', 'mapped' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('longitude', EntityType::class, [
                'label' => 'Longitude: ',
                'class' => Lieu::class, 'choice_label' => 'longitude', 'mapped' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Enregistrer', SubmitType::class, [
                'attr' => [
                    'class' => 'form-control button button1',
                ]
            ])
            ->add('Publier', SubmitType::class, [
                'attr' => [
                    'class' => 'form-control button button2'
                ]
            ])
            ->add('Annuler', SubmitType::class, [
                'attr' => [
                    'class' => 'form-control button button3'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
