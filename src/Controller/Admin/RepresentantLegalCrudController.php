<?php

namespace App\Controller\Admin;

use App\Entity\RepresentantLegal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RepresentantLegalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RepresentantLegal::class;
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
