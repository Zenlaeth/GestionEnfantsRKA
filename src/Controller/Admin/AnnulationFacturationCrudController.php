<?php

namespace App\Controller\Admin;

use App\Entity\AnnulationFacturation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AnnulationFacturationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AnnulationFacturation::class;
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
