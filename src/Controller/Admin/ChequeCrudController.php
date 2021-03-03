<?php

namespace App\Controller\Admin;

use App\Entity\Cheque;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChequeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cheque::class;
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
