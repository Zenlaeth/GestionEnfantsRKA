<?php

namespace App\Controller\Admin;

use App\Entity\MoyenPaiement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MoyenPaiementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MoyenPaiement::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
