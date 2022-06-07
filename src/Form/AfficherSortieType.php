<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Lieu;
use App\Entity\Sortie;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AfficherSortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de la sortie:',
                'required' => false
            ])

            ->add('dateHeureDebut', DateTimeType::class, [
                'label' => 'Date et heure de la sortie: ',
                'widget' => 'single_text'
            ])
            ->add('dateLimiteInscription', DateType::class,[
                'label' => 'Date limite d\'inscription :',
                'widget' => 'single_text'
            ])

            ->add('nbinscriptionsMax', NumberType::class, [
                'label' => 'Nombre de places: ',
                'required' => false
            ])

            ->add('duree', NumberType::class, [
                'label' => 'Durée:',
                'required' => false
            ])
            ->add('infosSortie', TextareaType::class, [
                'label' => 'Description et infos: ',
                'required' => false
            ])
            ->add('campus',EntityType::class, [
                'label' => 'Campus: ',
                'class' => Campus::class, 'choice_label' => 'nom', 'mapped'=>false,
            ])
            ->add('lieuxSorties',EntityType::class, [
                'label' => 'Lieu: ',
                'class' => Lieu::class, 'choice_label' => 'rue', 'mapped'=>false
            ])
            ->add('rue',EntityType::class, [
                'label' => 'Rue: ',
                'class' => Lieu::class, 'choice_label' => 'rue', 'mapped'=>false
            ])
            ->add('codePostal',EntityType::class, [
                'label' => 'Code Postal: ',
                'class' => Ville::class, 'choice_label' => 'codePostal', 'mapped'=>false
            ])
            ->add('latitude',EntityType::class, [
                'label' => 'Latitude: ',
                'class' => Lieu::class, 'choice_label' => 'latitude', 'mapped'=>false
            ])

            ->add('longitude',EntityType::class, [
                'label' => 'Longitude: ',
                'class' => Lieu::class, 'choice_label' => 'longitude', 'mapped'=>false
            ])


            /*->add('estRattache', EntityType::class, [
                'label' => 'Campus :',
                'choice_label'=> "nom",
                'class' => Campus::class
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }

}
