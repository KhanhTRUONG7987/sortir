<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Sortie;
use App\Entity\User;
use App\Entity\Lieu;
use App\Form\AfficherSortieType;
use App\Form\AnnulerSortieType;
use App\Form\CreateSortieType;
use App\Form\ModifierSortieType;
use App\Repository\EtatRepository;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sortie')]
class SortieController extends AbstractController
{
    #[Route('/createSortie', name: 'sortie_createSortie', methods: ['GET', 'POST'])]
    public function createSortie(Request $request, SortieRepository $sortieRepository, EtatRepository $etatRepository): Response
    {
        $sortie = new Sortie();

        /**
         * @var User $user
         */
        /**
         * @var Etat $etat
         */

//
//        $user = $this->getUser();
//        $etat = $this->g;
//        $sortie ->setOrganiser($user)
//                ->setLieuxSorties()
//                ->setEtat($etat)
//                ->setSortieOrganisee($this->getSortie())
//                ->setEtatSorties($this->getEtat());

        //Mettre un etat à une sortie:



     $etat = $etatRepository->findOneBy(['libelle' => 'Créée']);
        $sortie->setEtatSorties($etat);
        $sortie->setOrganisateur($this->getUser());




        //formulaire
        $createSortieForm = $this->createForm(CreateSortieType::class, $sortie);
        $createSortieForm->handleRequest($request);

        if ($createSortieForm->isSubmitted() && $createSortieForm->isValid())
        {
            $sortieRepository->add($sortie, true);

            $this->addFlash('success', 'Sortie créée');

            return $this->redirect($this->generateUrl('home'));
        }
        //response
        return $this->render('sortie/createSortie.html.twig', [
            'sortie' => $sortie,
            "createSortieForm" => $createSortieForm->createView(),
        ]);
    }

//    #[Route('/sortie', name: 'sortie')]
//    public function index(SortieRepository $sortieRepository): Response
//    {
//        return $this->render('sortie/index.html.twig', [
//            'sorties' => $sortieRepository->findAll(),
//        ]);
//    }

//#############################AFFICHER UNE SORTIE################################

    #[Route('/afficherSortie/{id}', name: 'sortie_afficherSortie')]
    public function afficher($id, SortieRepository $sortieRepository, Request $request):Response
    {
        $sortie = $sortieRepository->find($id);
        $afficherUneSortie = $this->createForm(AfficherSortieType::class, $sortie);
        $afficherUneSortie->handleRequest($request);
        return $this->render('sortie/afficherUneSortie.html.twig', [
            'id' => $sortie,
            //'sortie' => $sortie,
            'afficherUneSortie' => $afficherUneSortie->createView(),
        ]);
    }

    //#############################MODIFIER UNE SORTIE################################

    #[Route('/modifierSortie/{id}', name: 'sortie_modifierSortie')]
    public function modifier($id, SortieRepository $sortieRepository, Request $request)
    {
        $sortie = $sortieRepository->find($id);
        $modifierUneSortie = $this->createForm(ModifierSortieType::class, $sortie);
        $modifierUneSortie->handleRequest($request);

        if ($modifierUneSortie->isSubmitted() && $modifierUneSortie->isValid()) {

            $sortieRepository->add($sortie, true);

            $this->addFlash('success', 'Sortie modifiée');
            return $this->redirect($this->generateUrl('home'));
        }
        return $this->render('sortie/modifierUneSortie.html.twig', [
            'id' => $sortie,
            'modifierUneSortie' => $modifierUneSortie->createView(),
        ]);

    }

    //#############################ANNULER UNE SORTIE################################

    #[Route('/annulerSortie/{id}', name: 'sortie_annulerSortie')]
    public function annuler(Request $request, Sortie $sortie, SortieRepository $sortieRepository)
    {
        $annulerUneSortie = $this->createForm(AnnulerSortieType::class, $sortie);
        $annulerUneSortie->handleRequest($request);

        if ($annulerUneSortie->isSubmitted() && $annulerUneSortie->isValid()) {

            $sortieRepository->remove($sortie, true);

            //message
            $this->addFlash('success', 'Sortie annulée');
            return $this->redirect($this->generateUrl('home'));
        }
        return $this->render('sortie/annulerUneSortie.html.twig', [
            'id' => $sortie,
            'annulerUneSortie' => $annulerUneSortie->createView(),
        ]);

    }
}