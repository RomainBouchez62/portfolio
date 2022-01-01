<?php

namespace App\Controller\Admin;

use App\Entity\Competence;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CompetenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Competence::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX,Action::EDIT,function (Action $action){
                return $action->setLabel('Modifer');
            })
            ->update(Crud::PAGE_INDEX,Action::DELETE,function (Action $action){
                return $action->setLabel('Supprimer');
            })
            ->update(Crud::PAGE_INDEX,Action::NEW,function (Action $action){
                return $action->setLabel('Ajouter une compétence');
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
                return $action->setLabel('Créer une compétence et en ajouter une autre');
            })
            ->update(Crud::PAGE_NEW,Action::SAVE_AND_RETURN,function (Action $action){
                return $action->setLabel('Créer une compétence');
            });
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomCompetence','Nom'),
            TextField::new('niveauCompetence','Niveau'),
            TextField::new('imageFile','Image')->setFormType(VichImageType::class)->onlyWhenCreating()->onlyWhenUpdating(),
            ImageField::new('image','Image')->setBasePath('/uploads/images/competences/')->onlyOnIndex()
        ];
    }

}
