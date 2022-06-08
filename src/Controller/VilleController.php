<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Form\AfficherSortieType;
use App\Form\AfficherVilleType;
use App\Form\VilleType;
use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ville')]
class VilleController extends AbstractController
{
    #[Route('/', name: 'ville_index', methods: ['GET'])]
    public function index(VilleRepository $villeRepository): Response
    {
        return $this->render('ville/index.html.twig', [
            'villes' => $villeRepository->findAll(),
        ]);
    }

    #[Route('/', name: 'ville_indexSearch', methods: ['GET'])]
    public function indexAction(Request $request, VilleRepository $villeRepository): Response
    {

        return $this->render(':ville:index.html.twig', array());
    }

    /**
     * @throws \Exception
     */
    #[Route('/', name: 'search', methods: ['GET'])]
    public function searchAction(Request $request, VilleRepository $villeRepository)
    {
        $value =  $request->get("find");
        //implement your search here,
        $result = $villeRepository->findBySearch(array("find"=>$value));
        //Here you can return your data in JSON format or in a twig template
    }

    #[Route('/new', name: 'ville_new', methods: ['GET', 'POST'])]
    public function new(Request $request, VilleRepository $villeRepository): Response
    {
        $ville = new Ville();
        $createVilleform = $this->createForm(VilleType::class, $ville);
        $createVilleform->handleRequest($request);

        if ($createVilleform->isSubmitted() && $createVilleform->isValid()) {
            $villeRepository->add($ville, true);

            return $this->redirectToRoute('ville_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ville/new.html.twig', [
            'ville' => $ville,
            'form' => $createVilleform->createView(),
        ]);
    }

    #[Route('/{id}', name: 'ville_show', methods: ['GET'])]
    public function show($id, VilleRepository $villeRepository, Request $request): Response
    {
        $ville = $villeRepository->find($id);
        $afficherUneVille = $this->createForm(AfficherVilleType::class, $ville);
        $afficherUneVille->handleRequest($request);
        return $this->render('ville/show.html.twig', [
            'id' => $ville,
            'afficherUneVille' => $afficherUneVille->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'ville_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ville $ville, VilleRepository $villeRepository): Response
    {
        $modifierVilleForm = $this->createForm(VilleType::class, $ville);
        $modifierVilleForm->handleRequest($request);

        if ($modifierVilleForm->isSubmitted() && $modifierVilleForm->isValid()) {
            $villeRepository->add($ville, true);

            return $this->redirectToRoute('ville_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ville/edit.html.twig', [
            'ville' => $ville,
            'form' => $modifierVilleForm->createView(),
        ]);
    }

    #[Route('/{id}', name: 'ville_delete', methods: ['POST'])]
    public function delete(Request $request, Ville $ville, VilleRepository $villeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ville->getId(), $request->request->get('_token'))) {
            $villeRepository->remove($ville, true);
        }

        return $this->redirectToRoute('ville_index', [], Response::HTTP_SEE_OTHER);
    }
}
