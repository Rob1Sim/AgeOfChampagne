<?php

namespace App\Controller\Admin;

use App\Entity\Cru;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CruCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cru::class;
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
