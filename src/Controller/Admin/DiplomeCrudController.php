<?php

namespace App\Controller\Admin;

use App\Entity\Diplome;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
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

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX,Action::EDIT,function (Action $action){
                return $action->setLabel('Editer');
            })
            ->update(Crud::PAGE_INDEX,Action::DELETE,function (Action $action){
                return $action->setLabel('Supprimer');
            })
            ->update(Crud::PAGE_INDEX,Action::NEW,function (Action $action){
                return $action->setLabel('Ajouter un diplôme');
            })
            ->update(Crud::PAGE_INDEX,Action::BATCH_DELETE,function (Action $action){
                return $action->setLabel('Supprimer la sélection');
            })
            ->update(Crud::PAGE_EDIT,Action::SAVE_AND_RETURN,function (Action $action){
                return $action->setLabel('Sauvegarder et quitter');
            })
            ->update(Crud::PAGE_EDIT,Action::SAVE_AND_CONTINUE,function (Action $action){
                return $action->setLabel('Sauvegarder et continuer');
            })
            ->update(Crud::PAGE_NEW,Action::SAVE_AND_ADD_ANOTHER,function (Action $action){
                return $action->setLabel('Créer un diplôme et en ajouter un autre');
            })
            ->update(Crud::PAGE_NEW,Action::SAVE_AND_RETURN,function (Action $action){
                return $action->setLabel('Créer un diplôme');
            });
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
