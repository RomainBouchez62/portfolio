<?php

namespace App\Controller\Admin;

use App\Entity\Experience;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
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
                return $action->setLabel('Ajouter une expérience');
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
                return $action->setLabel('Créer une expérience et en ajouter une autre');
            })
            ->update(Crud::PAGE_NEW,Action::SAVE_AND_RETURN,function (Action $action){
                return $action->setLabel('Créer une expérience');
            });
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
