<?php

namespace App\Controller;

use App\Entity\Campus;
use App\Form\CampusType;
use App\Repository\CampusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/campus')]
class CampusController extends AbstractController
{
    #[Route('/', name: 'campus_index', methods: ['GET'])]
    public function index(CampusRepository $campusRepository): Response
    {
        return $this->render('campus/index.html.twig', [
            'campuses' => $campusRepository->findAll(),
        ]);
    }

    #[Route('/', name: 'campus_indexSearch', methods: ['GET'])]
    public function indexAction(Request $request, CampusRepository $campusRepository): Response
    {

        return $this->render('campus/index.html.twig', array());
    }

    /**
     * @throws \Exception
     */
    #[Route('/', name: 'search', methods: ['GET'])]
    public function searchAction(Request $request, CampusRepository $campusRepository)
    {
        $value =  $request->get("find");
        //implement your search here,
        $result = $campusRepository->findBySearch(array("find"=>$value));
        //Here you can return your data in JSON format or in a twig template
    }
    #[Route('/new', name: 'campus_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CampusRepository $campusRepository): Response
    {
        $campus = new Campus();
        $campus->setNom("NANTES");
        //$form = $this->createForm(CampusType::class, $campus);
        //$form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
        $campusRepository->add($campus, true);

        return $this->redirectToRoute('campus_index', [], Response::HTTP_SEE_OTHER);
        //}

        //return $this->renderForm('campus/index.html.twig', [
        // 'campus' => $campus,
        //'form' => $form,
        //]);
    }

    #[Route('/{id}', name: 'campus_show', methods: ['GET'])]
    public function show(Campus $campus): Response
    {
        return $this->render('campus/index.html.twig', [
            'campus' => $campus,
        ]);
    }

    #[Route('/{id}/edit', name: 'campus_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Campus $campus, CampusRepository $campusRepository): Response
    {
        $form = $this->createForm(CampusType::class, $campus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $campusRepository->add($campus, true);

            return $this->redirectToRoute('campus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('campus/index.html.twig', [
            'campus' => $campus,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'campus_delete', methods: ['POST'])]
    public function delete(Request $request, Campus $campus, CampusRepository $campusRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$campus->getId(), $request->request->get('_token'))) {
            $campusRepository->remove($campus, true);
        }

        return $this->redirectToRoute('campus_index', [], Response::HTTP_SEE_OTHER);
    }

}
