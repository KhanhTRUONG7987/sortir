<?php

namespace App\Controller;

use App\Entity\Sortie;
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
    #[Route('/sortie', name: 'sortie')]
    public function index(SortieRepository $repo): Response
    {
        return $this->render('', [
            'controller_name' => 'SortieController',
        ]);
    }

    #[Route('/sortie/createSortie', name: 'sortie_createSortie')]
    public function createSortie(): Response
    {
        $sortie = new Sortie();


        $createSortieForm = $this->createForm(CreateSortieType::class, $sortie);
        return $this->render('sortie/createSortie.html.twig', [
            "createSortieForm" => $createSortieForm->createView()
        ]);
        /*return $this->redirectToRoute('sortie_consulterSortie', ['id'=>$sortie->getId()]);*/
    }

    #[Route('/sortie/afficherSortie', name: 'sortie_afficherSortie')]
    public function show(SortieRepository $repo)
    {
        $sorties = $repo->findAll();
        for ($i = 0; $i < 20; $i++) {

            return $this->render('sortie/afficherUneSortie.html.twig', [
                'sortie' => $sorties
            ]);
        }

    }

    #[Route('/sortie/home', name: 'home')]
    public function home(): Response
    {
        return $this->render('sortie/home.html.twig');
    }


}
