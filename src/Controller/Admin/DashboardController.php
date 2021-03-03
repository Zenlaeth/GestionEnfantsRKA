<?php

namespace App\Controller\Admin;

use App\Entity\Role;
use App\Entity\User;
use App\Entity\Cheque;
use App\Entity\Enfant;
use App\Entity\Statut;
use App\Entity\Especes;
use App\Entity\Materiel;
use App\Entity\Facturation;
use App\Entity\CarteBancaire;
use App\Entity\MoyenPaiement;
use App\Entity\ChequeVacances;
use App\Entity\RepresentantLegal;
use App\Entity\AnnulationFacturation;
use App\Entity\ModificationFacturation;
use App\Controller\Admin\UserCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/admin", name="admin"))
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::section(label:'Important');
        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Role', 'fas fa-list', Role::class);
        yield MenuItem::section('Moyen paiement');
        yield MenuItem::linkToCrud('MoyenPaiement', 'fas fa-list', MoyenPaiement::class);
        yield MenuItem::linkToCrud('Carte bancaire', 'fas fa-list', CarteBancaire::class);
        yield MenuItem::linkToCrud('Cheque', 'fas fa-list', Cheque::class);
        yield MenuItem::linkToCrud('Cheque vacances', 'fas fa-list', ChequeVacances::class);
        yield MenuItem::linkToCrud('Especes', 'fas fa-list', Especes::class);
        yield MenuItem::section('Enfants');
        yield MenuItem::linkToCrud('Enfant', 'fas fa-list', Enfant::class);
        yield MenuItem::linkToCrud('Representant legal', 'fas fa-list', RepresentantLegal::class);
        yield MenuItem::section('Facturations');
        yield MenuItem::linkToCrud('Facturation', 'fas fa-list', Facturation::class);
        yield MenuItem::linkToCrud('Statut', 'fas fa-list', Statut::class);
        yield MenuItem::linkToCrud('AnnulationFacturation', 'fas fa-list', AnnulationFacturation::class);
        yield MenuItem::linkToCrud('ModificationFacturatio8n', 'fas fa-list', ModificationFacturation::class);
        yield MenuItem::section('Materiel');
        yield MenuItem::linkToCrud('Materiel', 'fas fa-list', Materiel::class);
        
        


        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);        
    }
}
