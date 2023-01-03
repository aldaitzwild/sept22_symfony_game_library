<?php

namespace App\Controller;

use App\Entity\Studio;
use App\Form\StudioType;
use App\Repository\StudioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudioController extends AbstractController
{
    #[Route('/studio', name: 'app_studio')]
    public function index(StudioRepository $studioRepository): Response
    {
        $studios = $studioRepository->findBy([], ['nbOfEmployees' => 'ASC']);

        return $this->render('studio/index.html.twig', [
            "studios" => $studios
        ]);
    }

    #[Route('/studio/add', name: 'app_studio_add')]
    public function add(Request $request, StudioRepository $studioRepository): Response
    {
        $studio = new Studio();
        $form = $this->createForm(StudioType::class, $studio);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $studioRepository->save($studio, true);

            return $this->redirectToRoute('app_studio');
        }

        return $this->renderForm('studio/add.html.twig', [
            'form' => $form
        ]);
    }
}
