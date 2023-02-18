<?php

namespace App\Controller\Admin;

use App\Entity\CategoriesProduit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategoriesProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategoriesProduit::class;
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
