<?php

namespace App\Controller;


use App\Entity\ProfilPhoto;
use App\Entity\User;
use App\Form\MonProfilType;
use App\Form\ProfilPhotoType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class GestionProfilController extends AbstractController
{
    #[Route('/monprofil', name: 'monprofil')]
    public function modifierProfil(UserRepository $userRepository, Request $request, UserPasswordHasherInterface $passwordHashed): Response
    {
        // récupération du User connecté

        $user = $userRepository->find($this->getUser());


        // Création du formulaire contenant les données de la classe MonProfilType pour obtenir les infos du User connecté
        $nouveauProfilParticipantForm = $this->createForm(MonProfilType::class, $user);
        $nouveauProfilParticipantForm->handleRequest($request);

        //traitement du formulaire
        if ($nouveauProfilParticipantForm->isSubmitted() && $nouveauProfilParticipantForm->isValid()) {

            //conditionne cette partie à la présence d'un nouveu mot de passe
            if ($nouveauProfilParticipantForm['password']->getData()) {
                $nouveauMDP = $nouveauProfilParticipantForm ['password']->getData();

                //hashage du nouveau mot de passe
                $hash = $passwordHashed->hashPassword($user, $nouveauMDP);
                $this->getUser()->setPassword($hash);
                $this->addFlash("success", "Votre mot de passe a été modifié avec succès");
            }

            $userRepository->add($user, true);
            $this->addFlash("success", "Votre profil a été modifié avec succès");
            return $this->redirectToRoute('monprofil');
        }


        return $this->render('gestion_profil/gestionProfil.html.twig', ['nouveauProfilParticipantForm' => $nouveauProfilParticipantForm->createView()
            ,]);
    }

    #[Route('/monprofil/photo', name: 'photo')]
    public function chargerPhoto(Request $request, UserRepository $userRepository,): Response
    {

        $profilPhoto = new ProfilPhoto();
        $profilPhotoForm = $this->createForm(ProfilPhotoType::class, $profilPhoto);

        return $this->render('gestion_profil/gestionProfil.html.twig', array(
            'profilPhotoForm' => $profilPhotoForm->createView(),
        ));
    }
}
