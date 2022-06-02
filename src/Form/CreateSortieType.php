<?php

namespace App\Form;

use App\Entity\Sortie;
use App\Entity\Ville;
use App\Entity\Campus;
use App\Entity\Lieu;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreateSortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('dateHeureDebut')
            ->add('dateLimiteInscription')
            ->add('nbinscriptionsMax')
            ->add('duree')
            ->add('infosSortie')

            ->add('campus',EntityType::class, [
                'class' => Campus::class, 'choice_label' => 'nom', 'mapped'=>false
            ])
            ->add('ville',EntityType::class, [
                'class' => Ville::class, 'choice_label' => 'nom', 'mapped'=>false
            ])
            ->add('lieuxSorties',EntityType::class, [
                'class' => Lieu::class, 'choice_label' => 'rue', 'mapped'=>false
            ])

            ->add('rue',EntityType::class, [
                'class' => Lieu::class, 'choice_label' => 'rue', 'mapped'=>false
            ])

            ->add('codePostal',EntityType::class, [
                'class' => Ville::class, 'choice_label' => 'codePostal', 'mapped'=>false
            ])

            ->add('latitude',EntityType::class, [
                'class' => Lieu::class, 'choice_label' => 'latitude', 'mapped'=>false
            ])

            ->add('longitude',EntityType::class, [
                'class' => Lieu::class, 'choice_label' => 'longitude', 'mapped'=>false
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
