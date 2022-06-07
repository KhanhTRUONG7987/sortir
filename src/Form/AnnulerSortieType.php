<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Lieu;
use App\Entity\Sortie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnulerSortieType extends AbstractType
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
            ->add('dateHeureDebut', DateType::class, [
                'label' => 'Date de la sortie: ',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('campus', EntityType::class, [
                'label' => 'Campus: ',
                'class' => Campus::class, 'choice_label' => 'nom', 'mapped' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('lieuxSorties', EntityType::class, [
                'label' => 'Lieu: ',
                'class' => Lieu::class, 'choice_label' => 'rue', 'mapped' => false,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('infosSortie')->add('infosSortie', TextareaType::class, [
                'label' => 'Motif: ',
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
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
