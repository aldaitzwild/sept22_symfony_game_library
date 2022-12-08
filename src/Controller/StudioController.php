<?php

namespace App\Controller;

use App\Entity\Studio;
use App\Form\StudioType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudioController extends AbstractController
{
    #[Route('/studio', name: 'app_studio')]
    public function index(): Response
    {
        return $this->render('studio/index.html.twig', [
            'controller_name' => 'StudioController',
        ]);
    }

    #[Route('/studio/add', name: 'app_studio_add')]
    public function add(): Response
    {
        $studio = new Studio();
        $form = $this->createForm(StudioType::class, $studio);

        return $this->renderForm('studio/add.html.twig', [
            'form' => $form
        ]);
    }
}
