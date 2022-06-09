<?php

namespace App\Controller;

use App\Form\AfficherParticipantsType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffichageParticipantsController extends AbstractController

{

    // Gestion de l'affiche d'un profil d'un participant

    #[Route('/profil_participant/{id} ', name: 'profil_participant')]
    public function afficheProfilParticipant($id, UserRepository $userRepository, Request $request): Response
    {

        //
        $participant = $userRepository->findOneBy(['pseudo' => $id]);
        $participantForm = $this->createForm(AfficherParticipantsType::class, $participant);
        $participantForm->handleRequest($request);



        return $this->render('affichage_participants/profilParticipant.html.twig', [
            'id' => $id,
            'participant' => $participant,

            'participantForm' => $participantForm->createView(),
        ]);
    }
}
