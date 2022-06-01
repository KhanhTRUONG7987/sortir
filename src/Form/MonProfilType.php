<?php

namespace App\Form;

use App\Entity\Campus;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MonProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'required' => false
            ])

            ->add('prenom', TextType::class, [
                'label' => 'Prenom',
                'required' => false
            ])

            ->add('telephone', TextType::class, [
                'label' => 'téléphone ',
                'required' => false
            ])

            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => false
            ])

            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe ',
                'required' => false
            ])

            /*->add('confirmation', PasswordType::class, [
                'label' => 'confirmation du mot de passe',
                'required' => false
            ])*/

            ->add('estRattache', EntityType::class, [

                'label' => 'Campus',
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
