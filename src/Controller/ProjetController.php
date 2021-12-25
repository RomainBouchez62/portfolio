<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Repository\ProjetRepository;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{
    /**
     * @Route("/projets", name="projets")
     */
    public function index(
        ProjetRepository $projetRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response
    {
        $data= $projetRepository->findAll();
        $projets=$paginator->paginate(
            $data, /* Requête */
            $request->query->getInt('page',1), /* Numéro de la page*/
            3 /*Limite par page */
        );
        return $this->render('projets/projets.html.twig', [
            'projets' => $projets,
        ]);
    }

    /**
     * @Route("/projet/{slugProjet}", name="projetshow", requirements={"slugProjet":"[a-z0-9\-]*"})
     * @param Projet $Projet
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function show(Projet $Projet): Response
    {
        return $this->render('projets/_show_projet.html.twig',[
            'projet'=>$Projet
        ]);
    }
}
