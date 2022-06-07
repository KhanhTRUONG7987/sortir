<?php

namespace App\Controller;
use App\Entity\Sortie;
use App\Entity\User;
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

        $searchFilters = new FiltresAccueilModel();
        $form = $this->createForm(FiltresAccueilType::class, $searchFilters);
                /*if($form->isValid()){
                    $searchFilters = $form->getData();
                }*/


        //######################## recuperer List de sortie ##################################

        $listSortie = $sortieRepository->findAll();

        //##################### recuperer roles du User #####################################

        $roleUser = $this->getUser()->getRoles();
        //$roleUser = $user->getRoles();
        $roleUser = implode(",", $roleUser);


        return $this->render('sortie/home.html.twig', [
            'controller_name' => 'FiltresAccueilController',
            'listSortie' => $listSortie,
            'roleUser' => $roleUser,
        ]);
    }
}
