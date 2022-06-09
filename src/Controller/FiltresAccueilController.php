<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\FiltresAccueilType;
use App\Form\Model\FiltresAccueilModel;
use App\Repository\SortieRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FiltresAccueilController extends AbstractController
{

                   //gestion de l'affichage de la page d'accueil:

    #[Route('/home', name: 'home')]
    public function accueil(SortieRepository $sortieRepository, Request $request): Response
    {

        //##############################partie formulaire de filtre###############################

        $filtresAccueilModel = new FiltresAccueilModel();
        $searchFiltersForm = $this->createForm(FiltresAccueilType::class, $filtresAccueilModel);
        $searchFiltersForm->handleRequest($request);

        $listSortie = $sortieRepository->findActivityByFilters($filtresAccueilModel);


        //######################## récuperer la liste des sorties ##################################


        return $this->render('sortie/home.html.twig', [
            'controller_name' => 'FiltresAccueilController',
            'listSortie' => $listSortie,

            'searchFiltersForm' => $searchFiltersForm->createView()
        ]);
    }

}
