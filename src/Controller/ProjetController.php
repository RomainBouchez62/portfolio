<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{
    /**
     * @Route("/projets", name="projets")
     */
    public function index(ProjetRepository $projetRepository): Response
    {
        return $this->render('projets/projets.html.twig', [
            'projets' => $projetRepository->findAll(),
        ]);
    }

    /**
     * @Route("/projet/{slug}-{id}", name="projet.show", requirements={"slug":"[a-z0-9\-]*"})
     * @param Projet $Projet
     * @param string $slug
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
//    public function show(Projet $Projet, string $slug)
//    {
//        if($Projet->getSlugProjet() !== $slug){
//            return $this->redirectToRoute('projet.show',[
//                'id'=>$Projet->getId(),
//                'slug'=>$Projet->getSlugProjet()
//            ],301);
//        }
//
//        return $this->redirectToRoute('projets/_show_projet.html.twig',[
//            'projet'=>$Projet
//        ]);
//    }
}
