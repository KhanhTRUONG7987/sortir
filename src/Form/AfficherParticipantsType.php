<?php

namespace App\Form;

use App\Entity\Campus;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AfficherParticipantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom :',
                'required' => false
            ])

            ->add('prenom', TextType::class, [
                'label' => 'Prénom :',
                'required' => false
            ])

            ->add('telephone', TextType::class, [
                'label' => 'Téléphone :',
                'required' => false
            ])


            ->add('email', EmailType::class, [
                'label' => 'Email :',
                'required' => false
            ])

            ->add('estRattache', EntityType::class, [
                'label' => 'Campus :',
                'choice_label' =>'nom',
                'class' => Campus::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
