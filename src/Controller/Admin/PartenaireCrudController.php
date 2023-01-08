<?php

namespace App\Controller\Admin;

use App\Entity\Partenaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PartenaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partenaire::class;
    }

    public function configureFields(string $pageName): iterable
    {
        // TODO régler le bug de save
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom', 'Nom'),
            TextField::new('prenom', 'Prénom'),
            AssociationField::new('vigneronsPart', 'Vignerons partenaires')
                ->setFormTypeOption('choice_label', function ($vigneron) {
                    return $vigneron->getNom().' '.$vigneron->getPrenom();
                })
                ->formatValue(function ($value, $entity) {
                    if (null != $entity->getVigneronsPart()[0]) {
                        // Affiche ... si il y a plus d'un vignerons
                        if (count($entity->getVigneronsPart()) > 1) {
                            return $entity->getVigneronsPart()[0]->getNom().' '.$entity->getVigneronsPart()[0]->getPrenom().'...';
                        }

                        return $entity->getVigneronsPart()[0]->getNom().' '.$entity->getVigneronsPart()[0]->getPrenom();
                    }

                    return 'Pas de vignerons';
                }),
        ];
    }
}
