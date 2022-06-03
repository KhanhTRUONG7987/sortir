<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\AfficherSortieType;
use App\Form\AnnulerSortieType;
use App\Form\CreateSortieType;
use App\Form\ModifierSortieType;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    #[Route('/sortie/createSortie', name: 'sortie_createSortie')]
    public function createSortie(Request $request, SortieRepository $sortieRepository): Response
    {
        $sortie = new Sortie();
        /*$sortie ->setOrganisateur($this->getUser())
                ->setLieuxSorties($this->get())
                ->setEtat($this->getSortie())
                ->setSortieOrganisee($this->getSortie())
                ->setEtatSorties($this->getEtat());*/


        //formular
        $createSortieForm = $this->createForm(CreateSortieType::class, $sortie);
        $createSortieForm->handleRequest($request);

        if ($createSortieForm->isSubmitted() && $createSortieForm->isValid())
        {
            //dump($sortie)
            //EntityManager
            $sortieRepository->add($sortie, true);

            $this->addFlash('success', 'Sortie créée');

            return $this->redirectToRoute($this->generateUrl('home'));
        }
        //response
        return $this->render('sortie/createSortie.html.twig', [
            /*'sortie' => $sortie,*/
            "createSortieForm" => $createSortieForm->createView(),
        ]);
    }

//    #[Route('/sortie', name: 'sortie')]
//    public function index(SortieRepository $sortieRepository): Response
//    {
//        return $this->render('sortie/campus.html.twig', [
//            'sorties' => $sortieRepository->findAll(),
//        ]);
//    }

    #[Route('/sortie/afficherSortie/{id}', name: 'sortie_afficherSortie')]
    public function afficher($id, SortieRepository $sortieRepository, Request $request)
    {
        $sortie = $sortieRepository->find($id);
        $afficherUneSortie = $this->createForm(AfficherSortieType::class, $sortie);
        $afficherUneSortie->handleRequest($request);

        return $this->redirectToRoute('sortie_afficherSortie', [
            'id' => $sortie,
            'afficherUneSortie' => $afficherUneSortie->createView(),
        ]);
    }
//        return $this->render('sortie/afficherUneSortie.html.twig', [
//            'id' => $sortie,
//            'afficherUneSortie' =>$afficherUneSortie->createView(),
//        ]);


    #[Route('/sortie/modifierSortie/{id}', name: 'sortie_modifierSortie')]
    public function modifier(int $id, SortieRepository $sortieRepository, Request $request)
    {
        $sortie = $sortieRepository->find($id);
        $modifierUneSortie = $this->createForm(ModifierSortieType::class, $sortie);
        $modifierUneSortie->handleRequest($request);

        if ($modifierUneSortie->isSubmitted() && $modifierUneSortie->isValid()) {

            $sortieRepository->add($sortie, true);

            $this->addFlash('success', 'Sortie modifiée');
            return $this->redirectToRoute($this->generateUrl('home'));
        }
        return $this->render('sortie/modifierUneSortie.html.twig', [
            'id' => $sortie,
            'modifierUneSortie' => $modifierUneSortie->createView(),
        ]);

    }

    #[Route('/sortie/annulerSortie/{id}', name: 'sortie_annulerSortie')]
    public function annuler(Sortie $sortie, SortieRepository $sortieRepository, Request $request)
    {
        $annulerUneSortie = $this->createForm(AnnulerSortieType::class, $sortie);
        $annulerUneSortie->handleRequest($request);

        if ($annulerUneSortie->isSubmitted() && $annulerUneSortie->isValid() && $this->isCsrfTokenValid('delate', $sortie->getId(), $request->request->get('token'))) {

            $sortieRepository->remove($sortie, true);

            //message
            $this->addFlash('success', 'Sortie annulée');
        }
        return $this->redirect($this->generateUrl('home'));

    }
}