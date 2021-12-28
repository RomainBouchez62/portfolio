<?php

namespace App\Controller\Admin;

use App\Entity\Competence;
use App\Entity\Diplome;
use App\Entity\Experience;
use App\Entity\Projet;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Diplômes', 'fas fa-graduation-cap', Diplome::class);
        yield MenuItem::linkToCrud('Expériences', 'fas fa-align-justify', Experience::class);
        yield MenuItem::linkToCrud('Compétences', 'fas fa-laptop-code', Competence::class);
        yield MenuItem::linkToCrud('Projets', 'fas fa-project-diagram', Projet::class);
    }
}
