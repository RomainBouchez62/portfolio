<?php

namespace App\Controller;

use App\Repository\CompetenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompetenceController extends AbstractController
{
    /**
     * @Route("/competence", name="competences")
     */
    public function index(CompetenceRepository $competenceRepository): Response
    {
        return $this->render('competence/competences.html.twig', [
            'competences' => $competenceRepository->findAll(),
        ]);
    }
}
