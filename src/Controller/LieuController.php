<?php

namespace App\Controller;

use App\Entity\Lieu;
use App\Form\LieuType;
use App\Repository\LieuRepository;
use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lieu')]
class LieuController extends AbstractController
{
    #[Route('/', name: 'lieu_index', methods: ['GET'])]
    public function index(LieuRepository $lieuRepository): Response
    {
        return $this->render('lieu/index.html.twig', [
            'lieus' => $lieuRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'lieu_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LieuRepository $lieuRepository, VilleRepository $villeRepository): Response
    {
        $lieu = new Lieu();
        /*
         * @var Ville $ville
         */
        $ville = $villeRepository->find('id');
        $lieu->setVilleLieux($ville);

//        $lieu->setVilleLieux($this->getVille());
        $lieu->setNom();
        $lieu->setRue();
        $lieu->setLongitude();
        $lieu->setLatitude();


        $form = $this->createForm(LieuType::class, $lieu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lieuRepository->add($lieu, true);

            return $this->redirectToRoute('lieu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lieu/index.html.twig', [
            'lieu' => $lieu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'lieu_show', methods: ['GET'])]
    public function show(Lieu $lieu): Response
    {
        return $this->render('lieu/index.html.twig', [
            'lieu' => $lieu,
        ]);
    }

    #[Route('/{id}/edit', name: 'lieu_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Lieu $lieu, LieuRepository $lieuRepository): Response
    {
        $form = $this->createForm(LieuType::class, $lieu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lieuRepository->add($lieu, true);

            return $this->redirectToRoute('lieu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lieu/index.html.twig', [
            'lieu' => $lieu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'lieu_delete', methods: ['POST'])]
    public function delete(Request $request, Lieu $lieu, LieuRepository $lieuRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $lieu->getId(), $request->request->get('_token'))) {
            $lieuRepository->remove($lieu, true);
        }

        return $this->redirectToRoute('lieu_index', [], Response::HTTP_SEE_OTHER);
    }

}
