<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\MonProfilType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionProfilController extends AbstractController
{
    #[Route('/monprofil', name: 'monprofil')]
    public function gestionProfil(?User $user, UserRepository $userRepository, Request $request): Response
    {

        //$nouveauProfilUser= new User();
        //$nouveauProfilUser->setPrenom("léa");

        $user = $this->getUser();

        $nouveauProfilParticipantForm = $this->createForm(MonProfilType::class, $user);
        $nouveauProfilParticipantForm->handleRequest($request);

        //traitement du formulaire
        if ($nouveauProfilParticipantForm->isSubmitted() && $nouveauProfilParticipantForm->isValid()) {
            if(!$user->getId()){
                $userRepository->persist($user);
            }

            $userRepository->flush();


            $this->addFlash("success", "Votre profil a été modifié avec succès");
            return $this->redirect($this->generateUrl('monprofil', ['id' => $user->getId()]));
        }


        return $this->render('gestion_profil/gestionProfil.html.twig', [
            'nouveauProfilParticipantForm' =>$nouveauProfilParticipantForm->createView()
        ,
        ]);
    }
}
