<?php

namespace App\Controller;

use App\Repository\DiplomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiplomeController extends AbstractController
{
    /**
     * @Route("/diplomes", name="diplomes")
     */
    public function index(DiplomeRepository $diplomeRepository): Response
    {
        return $this->render('diplome/diplomes.html.twig', [
            'diplomes' => $diplomeRepository->findAll(),
        ]);
    }
}
