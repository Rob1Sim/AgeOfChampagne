<?php

namespace App\Controller\Admin;

use App\Entity\Vigneron;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VigneronCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vigneron::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom', 'Nom'),
            TextField::new('prenom', 'Prénom'),
            TextField::new('adresse', 'Adresse'),
            TextField::new('code_postal', 'Code postal'),
            TextField::new('ville', 'Ville'),
        ];
    }
}
