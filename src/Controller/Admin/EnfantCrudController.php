<?php

namespace App\Controller\Admin;

use App\Entity\Enfant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EnfantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Enfant::class;
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
