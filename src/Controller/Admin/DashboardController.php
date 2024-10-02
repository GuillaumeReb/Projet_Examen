<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Continent;
use App\Entity\Couleur;
use App\Entity\Fabricant;
use App\Entity\Marque;
use App\Entity\Pays;
use App\Entity\Ticket;
use App\Entity\Typebiere;
use App\Entity\Vente;
use App\Repository\MarqueRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CouleurRepository;
use App\Repository\TypebiereRepository;
use App\Repository\ArticleRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;
use Doctrine\Persistence\ManagerRegistry;

#[Route('/admin')]
class DashboardController extends AbstractDashboardController
{
    private CouleurRepository $couleurRepository;
    private TypebiereRepository $typebiereRepository;
    private ArticleRepository $articleRepository;
    private MarqueRepository $marqueRepository;
    private ChartBuilderInterface $chartBuilder;


    public function __construct(
        CouleurRepository $couleurRepository,
        TypeBiereRepository $typebiereRepository,
        ArticleRepository $articleRepository,
        MarqueRepository $marqueRepository,
        ChartBuilderInterface $chartBuilder
    ) {
        $this->couleurRepository = $couleurRepository;
        $this->typebiereRepository = $typebiereRepository;
        $this->articleRepository = $articleRepository;
        $this->marqueRepository = $marqueRepository;
        $this->chartBuilder = $chartBuilder;
    }

    #[Route('/', name: 'app_admin_index')]
    public function index(): Response
    {
        $counters = [
         'color' => $this->couleurRepository->count([]),
         'type' => $this->typebiereRepository->count([]),
         'item' => $this->articleRepository->count([]),
         'brand' => $this->marqueRepository->count([]),
         ];



        // Utilisation de Doctrine pour exécuter la requête SQL
//        $entityManager = $this->getDoctrine()->getManager();
//        $connection = $entityManager->getConnection();
//        $sql = 'SELECT COUNT(a.id) AS nb, c.name
//                FROM article a
//                JOIN couleur c ON a.couleurs_id = c.id
//                GROUP BY c.id
//                ORDER BY nb ASC';
//        $statement = $connection->prepare($sql);
//        $statement->execute();
//        $results = $statement->fetchAllAssociative(); // Fetch associative array
//
//        // Préparer les données pour le graphique
//        $couleurNames = [];
//        $couleurCounts = [];
//
//        foreach ($results as $result) {
//            $couleurNames[] = $result['name'];
//            $couleurCounts[] = $result['nb'];
//        }




        $chart = $this->chartBuilder->createChart(Chart::TYPE_BAR);

        $chart->setData([
//            'labels' => $couleurNames,
            'labels' => ['Blanche', 'Ambré', 'Brune', 'Blonde'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
//                    'data' => $couleurCounts,
                    'data' => [280, 577, 926, 1438],
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 2000,
                ],
            ],
        ]);

        return $this->render('bundles/EasyAdminBundle/dashboard.html.twig', [
            'counters' => $counters,
            'chart' => $chart,
        ]);
    }
    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('css/dashboard.css');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('S.D.B.M')
            ;
    }

    public function configureCrud(): Crud
    {
        return parent::configureCrud()
            ->setPaginatorPageSize(15)
            ->showEntityActionsInlined()
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Article', 'fas fa-beer-mug-empty', Article::class);
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Vente', 'fas fa-sack-dollar', Vente::class);
        yield MenuItem::linkToCrud('Ticket', 'fas fa-ticket', Ticket::class);
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Marque', 'fas fa-stamp', Marque::class);
        yield MenuItem::linkToCrud('Fabricant', 'fas fa-industry', Fabricant::class);
        yield MenuItem::linkToCrud('Pays', 'fas fa-map-location-dot', Pays::class);
        yield MenuItem::linkToCrud('Continent', 'fas fa-globe', Continent::class);
        yield MenuItem::linkToCrud('Type de bière', 'fas fa-quote-left', Typebiere::class);
        yield MenuItem::linkToCrud('Couleur', 'fas fa-palette', Couleur::class);
    }
}
