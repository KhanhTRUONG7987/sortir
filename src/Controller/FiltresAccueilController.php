<?php

namespace App\Controller;

use App\Form\FiltresAccueilType;
use App\Form\Model\FiltresAccueilModel;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FiltresAccueilController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function accueil(SortieRepository $sortieRepository, Request $request): Response
    {
        $searchFilters = new FiltresAccueilModel();
        $form = $this->createForm(FiltresAccueilType::class, $searchFilters);

        if($form->isValid()){
            $searchFilters = $form->getData();


        }





        return $this->render('filtres_accueil/index.html.twig', [
            'controller_name' => 'FiltresAccueilController',
        ]);
    }
}
