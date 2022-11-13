<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use App\Form\ImagesType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projet::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX,Action::DETAIL)
            ->update(Crud::PAGE_INDEX,Action::EDIT,function (Action $action){
                return $action->setLabel('Modifier');
            })
            ->update(Crud::PAGE_INDEX,Action::DELETE,function (Action $action){
                return $action->setLabel('Supprimer');
            })
            ->update(Crud::PAGE_INDEX,Action::NEW,function (Action $action){
                return $action->setLabel('Ajouter un projet');
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
                return $action->setLabel('Créer un projet et en ajouter un autre');
            })
            ->update(Crud::PAGE_NEW,Action::SAVE_AND_RETURN,function (Action $action){
                return $action->setLabel('Créer un projet');
            });
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomProjet','Nom : '),
            SlugField::new('slugProjet','URL du projet : ')->setTargetFieldName('nomProjet'),
            TextEditorField::new('descriptionProjet','Description : '),
            TextField::new('lienProjet','Lien du projet : '),
            TextField::new('imageFile','Image en-tête : ')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('image','Image en-tête')
                ->setUploadDir('/uploads/images/projets/miniatures/')
                ->setBasePath('/uploads/images/projets/miniatures/')
                ->onlyOnIndex()
                ->onlyOnDetail(),
            CollectionField::new('images','Image')
                ->setEntryType(ImagesType::class)
                ->onlyOnForms(),
            CollectionField::new('images','Image')
                ->setTemplatePath('projets/images.html.twig')
                ->onlyOnDetail()
        ];
    }
}
