<?php

namespace App\Controller\Admin;

use App\Entity\Facturation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FacturationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Facturation::class;
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
