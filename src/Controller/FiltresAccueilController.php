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

    #[Route('/home', name: 'home')]
    public function accueil(SortieRepository $sortieRepository, Request $request): Response
    {

        //############################# Filtres ######################################

        $filtresAccueilModel = new FiltresAccueilModel();
        $searchFiltersForm = $this->createForm(FiltresAccueilType::class, $filtresAccueilModel);
        $searchFiltersForm->handleRequest($request);

        $listSortie = $sortieRepository->findActivityByFilters($filtresAccueilModel);


        //######################## recuperer List de sortie ##################################

        //######################## recuperer List de sortie ##################################
//        $sortieRepository->findAll();
//        $number = 0;
        return $this->render('sortie/home.html.twig', [
            'controller_name' => 'FiltresAccueilController',
            'listSortie' => $listSortie,
            //  'number' => $number,
            // retourner le formulaire des filtres
            //'filtresAccueilModel' => $filtresAccueilModel,
            'searchFiltersForm' => $searchFiltersForm->createView()
        ]);
    }

}