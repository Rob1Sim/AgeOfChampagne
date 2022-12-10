<?php

namespace App\Controller\Admin;

use App\Entity\Compte;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CompteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Compte::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email', 'Email'),
            TextField::new('login', 'Login'),
            TextField::new('password', 'Mot de passe')->hideOnForm()->hideOnIndex(),
            DateField::new('datenaiss', 'Date de naissance'),
            ArrayField::new('roles', 'Roles')->formatValue(function ($value, $entity) {
                if ('ROLE_ADMIN' == $entity->getRoles()[0]) {
                    return '<span CLASS="fa-solid fa-person-military-pointing"></span>';
                } elseif ('ROLE_PREMIUM' == $entity->getRoles()[0]) {
                    return '<span CLASS="fa-solid fa-person-rays"></span>';
                } else {
                    return '<span CLASS="fa-solid fa-person"></span>';
                }
            }),
            BooleanField::new('is_verified', 'Est vérifié'),
        ];
    }
}
