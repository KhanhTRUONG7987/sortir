<?php

namespace App\Form;


use App\Entity\Campus;
use App\Form\Model\FiltresAccueilModel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiltresAccueilType extends AbstractType
{

    /*
     * Formulaire de la page d'accueil permettant de filtrer la recherche des filtres
     * Utilisation d'un model : FiltresAccueilModel
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->setMethod('get')
            ->add('campus', EntityType::class, [
                'label' => 'Campus :',
                'class' =>Campus::class,
                'choice_label' => 'nom',
                'required' => false,
            ])

            ->add('motCles', SearchType::class, [
                'label' => 'Le nom contient :',
                'required' =>false,
            ])

            ->add('dateHeureDebut', DateType:: class, [
                'label' => 'Entre le ',
                'html5' =>false,
                //"widget" => 'single_text',
                'attr' =>['class' => 'datepicker'],
                //'format'=>'dd/MM/yyyy',
                'required' => false
            ])

            ->add('dateLimiteInscription', DateType:: class, [
                'label' => 'Et le ',
                'html5' =>false,
                //"widget" => 'single_text',
                'attr' =>['class' => 'datepicker'],
                //'format'=>'dd/MM/yyyy',
                'required' => false

            ])

            ->add('estOrganisateur', CheckboxType:: class, [
                'label' => "Sorties dont je suis l'organisateur/organisatrice ",
                'required' => false,
            ])

            ->add('inscrit', CheckboxType:: class, [
                'label' => "Sorties auxquelles je suis inscrit/inscrite ",
                'required' => false,
            ])
            ->add('pasInscrit', CheckboxType:: class, [
                'label' => "Sorties auxquelles je ne suis pas inscrit/inscrites",
                'required' => false,
            ])
            ->add('rechercher', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                ]
            ])

            ;
    }





    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FiltresAccueilModel::class
        ]);
    }
}
