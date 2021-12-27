<?php

namespace App\Controller\Admin;

use App\Entity\Diplome;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class DiplomeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Diplome::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomDiplome','Nom'),
            TextField::new('descriptifDiplome','Descriptif'),
            TextField::new('ecoleDiplome','Ecole'),
            DateField::new('dateObtentionDiplome','Date d\'obtention'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['dateObtentionDiplome' => 'DESC']);
    }
}
