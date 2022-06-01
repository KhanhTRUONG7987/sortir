<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Entity\User;
use App\Form\MonProfilType;
use App\Repository\ParticipantRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionProfilController extends AbstractController
{
    #[Route('/monprofil', name: 'monprofil')]
    public function gestionProfil(UserRepository $userRepository, Request $request): Response
    {

        $nouveauProfilUser= new User();
        $nouveauProfilUser->setPrenom("léa");

        //$this->getUser();

        $nouveauProfilParticipantForm = $this->createForm(MonProfilType::class, $nouveauProfilUser);
        $nouveauProfilParticipantForm->handleRequest($request);

        //traitement du formulaire
        if ($nouveauProfilParticipantForm->isSubmitted() && $nouveauProfilParticipantForm->isValid()) {
            $userRepository->add($nouveauProfilUser, true);
            $this->addFlash("success", "Votre profil a été modifié avec succès");
            return $this->redirectToRoute("sortie");
        }


        return $this->render('gestion_profil/gestionProfil.html.twig', [
            'nouveauProfilParticipantForm' =>$nouveauProfilParticipantForm->createView()
        ,
        ]);
    }
}
