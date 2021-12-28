<?php

namespace App\Controller\Admin;

use App\Entity\Competence;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CompetenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Competence::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomCompetence','Nom'),
            TextField::new('niveauCompetence','Niveau'),
            TextField::new('fileCompetence','Fichier')
        ];
    }

}
