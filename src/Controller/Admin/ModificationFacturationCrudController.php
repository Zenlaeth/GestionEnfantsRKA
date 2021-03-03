<?php

namespace App\Controller\Admin;

use App\Entity\ModificationFacturation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ModificationFacturationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ModificationFacturation::class;
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
