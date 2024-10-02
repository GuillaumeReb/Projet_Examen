<?php

namespace App\Controller\Admin;

use App\Entity\Typebiere;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;

class TypebiereCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Typebiere::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Types de bière')
            ->setSearchFields(['id', 'name'])
            ->setPaginatorPageSize(15)
            ->setPageTitle('new', 'Créer un type de bière')
            ->setPageTitle('edit', 'Modifier un type de bière');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Créer un nouveau Type');
            })
            ->update('new', Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Ajouter à la liste');
            });
    }
}
