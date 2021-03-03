<?php

namespace App\Controller\Admin;

use App\Entity\Especes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EspecesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Especes::class;
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
