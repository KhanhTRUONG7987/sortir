<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\AfficherSortie;
use App\Form\CreateSortieType;
use App\Repository\SortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Exception\LogicException;
use Symfony\Component\Form\Extension\Core\DataTransformer\NumberToLocalizedStringTransformer;
use Symfony\Component\Form\Extension\Core\DataTransformer\StringToFloatTransformer;


class SortieController extends AbstractController
{
    #[Route('/sortie/createSortie', name: 'sortie_createSortie')]
    public function createSortie(Request $request): Response
    {
        $sortie = new Sortie();

        //formular
        $createSortieForm = $this->createForm(CreateSortieType::class, $sortie);
        $createSortieForm->handleRequest($request);

        /*if ($createSortieForm->isSubmitted() && $createSortieForm->isValid()){
            //faire qqchose avec les données
            //dump($sortie)
            EntityManager
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->addFlash('success','Sortie créée');
        }*/
        //response
        return $this->render('sortie/createSortie.html.twig', [
            "createSortieForm" => $createSortieForm->createView()
        ]);
//        return $this->redirectToRoute('sortie_afficherSortie', ['id'=>$sortie->getId()]);
    }

//    #[Route('/sortie', name: 'sortie')]
//    public function index(SortieRepository $sortieRepository): Response
//    {
//        return $this->render('sortie/index.html.twig', [
//            'sorties' => $sortieRepository->findAll(),
//        ]);
//    }

    #[Route('/sortie/afficherSortie', name: 'sortie_afficherSortie')]
    public function show(?Sortie $sortie, SortieRepository $sortieRepository, Request $request)
    {
        $afficherUneSortie = $this->createForm(AfficherSortie::class, $sortie);
        $afficherUneSortie->handleRequest($request);
        $id = 1;
        $sortie = $sortieRepository->find($id, $lockMode = null, $lockVersion = null);

        //$sorties = $repo->find($id, $lockMode = null, $lockVersion = null);


        return $this->render('sortie/afficherUneSortie.html.twig', [
            'id' => $sortie->getId(),
            'afficherUneSortie' =>$afficherUneSortie->createView(),
        ]);

    }
}