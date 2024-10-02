<?php

namespace App\Controller\Admin;

use App\Entity\Vente;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class VenteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vente::class;
    }

    public function configureFields(string $pageName): iterable
    {
            return [
                IdField::new('id')->hideOnForm(),
                AssociationField::new('article', 'Article'),
                IntegerField::new('quantite', 'Quantité'),
                NumberField::new('prixVente', 'Prix Vente'),
                IntegerField::new('Annee', 'Année'),
                IntegerField::new('numeroTicket', 'Numéro de ticket'),
            ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['id', 'article.name', 'quantite', 'prixVente', 'annee', 'numeroTicket'])
            ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('article')
            ->add('quantite')
            ->add('prixVente')
            ->add('annee')
            ->add('numeroTicket')
            ;
    }
}
