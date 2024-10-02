<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use App\Repository\ArticleRepository;

class ArticleCrudController extends AbstractCrudController
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'label.item'),
            AssociationField::new('types', 'Type')
                ->setRequired(true)
                ->setFormTypeOption('choice_label', 'name'),
            AssociationField::new('marques', 'Marque')
                ->setRequired(true)
                ->setFormTypeOption('choice_label', 'name'),
            AssociationField::new('couleurs', 'Couleur')
                ->setRequired(true)
                ->setFormTypeOption('choice_label', 'name'),
            NumberField::new('prixAchat', 'Prix Achat'),
            IntegerField::new('volume', 'Volume'),
            NumberField::new('titrage', 'Titrage'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'label.item')
            ->setSearchFields(['id', 'name', 'types.name', 'marques.name', 'couleurs.name', 'prixAchat', 'volume', 'titrage'])
            ;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        $articleNames = $this->articleRepository->findAll();

        $choices = [];
        foreach ($articleNames as $article) {
            $choices[$article->getName()] = $article->getName();
        }

        return $filters
            ->add(ChoiceFilter::new('name')->setChoices($choices))
            ->add('types')
            ->add('marques')
            ->add('couleurs')
            ->add('prixAchat')
            ->add('volume')
            ->add('titrage')
            ;
    }
}
