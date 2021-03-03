<?php

namespace App\Controller\Admin;

use App\Entity\CarteBancaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CarteBancaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CarteBancaire::class;
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
