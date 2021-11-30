<?php

namespace App\Controller;

use App\Repository\ExperienceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExperienceController extends AbstractController
{
    /**
     * @Route("/experiences", name="experiences")
     */
    public function index(ExperienceRepository $experienceRepository): Response
    {
        return $this->render('experience/experiences.html.twig', [
            'experiences' => $experienceRepository ->findAll(),
        ]);
    }
}
