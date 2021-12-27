<?php

namespace App\Controller\Admin;

use App\Entity\Experience;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class ExperienceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Experience::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomExperience','Nom'),
            TextField::new('descriptifExperience','Description'),
            TextField::new('entrepriseExperience','Entreprise'),
            DateField::new('dateDebutExperience','Date de début'),
            DateField::new('dateFinExperience','Date de fin'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['dateDebutExperience' => 'DESC']);
    }

}
