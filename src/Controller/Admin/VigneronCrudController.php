<?php

namespace App\Controller\Admin;

use App\Entity\Vigneron;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
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
            TextField::new('code_postal', 'Code postal')->setMaxLength(5),
            TextField::new('ville', 'Ville'),
            AssociationField::new('partenaire', 'Partenaires')
                ->setFormTypeOption('choice_label', function ($partenaire) {
                    return $partenaire->getNom().' '.$partenaire->getPrenom();
                })->formatValue(function ($value, $entity) {
                    if (null !== $entity->getPartenaire()[0]) {
                        // Affiche ... si il y a plus d'un partenaires
                        if (count($entity->getPartenaire()) > 1) {
                            return $entity->getPartenaire()[0]->getNom().' '.$entity->getPartenaire()[0]->getPrenom().'...';
                        }

                        return $entity->getPartenaire()[0]->getNom().' '.$entity->getPartenaire()[0]->getPrenom();
                    } else {
                        return 'Pas de partenaires';
                    }
                }),
            AssociationField::new('animation', 'Animations')
                ->setFormTypeOption('choice_label', function ($animation) {
                    return $animation->getNom();
                })->formatValue(function ($value, $entity) {
                    if (null !== $entity->getAnimation()[0]) {
                        // Affiche ... si il y a plus d'une animations
                        if (count($entity->getAnimation()) > 1) {
                            return $entity->getAnimation()[0]->getNom().'...';
                        }

                        return $entity->getAnimation()[0]->getNom();
                    } else {
                        return "Pas d'animations";
                    }
                }),
        ];
    }
}
