<?php

namespace App\Controller;

use App\Repository\ExperienceRepository;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExperienceController extends AbstractController
{
    /**
     * @Route("/experiences", name="experiences")
     */
    public function index(ExperienceRepository $experienceRepository,
                          PaginatorInterface $paginator,
                          Request $request
    ): Response
    {
        //Récupération des données
        $data = $experienceRepository->findAll();

        $experiences=$paginator->paginate(
            $data, /* Requête */
            $request->query->getInt('page',1), /* Numéro de la page*/
            3 /*Limite par page */
        );
        return $this->render('experience/experiences.html.twig', [
            'experiences' => $experiences,
        ]);
    }
}
