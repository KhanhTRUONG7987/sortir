<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AffichageParticipantsController extends AbstractController
{
    #[Route('/profil_participant/{id} ', name: 'profil_participant')]
    public function afficheProfilParticipant($id, UserRepository $userRepository): Response
    {
        $participant = $userRepository->find($id);

        return $this->render('affichage_participants/profilParticipant.html.twig', [
            'id' => $id,
            'participant' => $participant
        ]);
    }
}
