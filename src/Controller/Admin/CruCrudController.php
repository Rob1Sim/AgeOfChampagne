<?php

namespace App\Controller\Admin;

use App\Entity\Cru;
use Doctrine\ORM\EntityRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CruCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cru::class;
    }

    public function configureFields(string $pageName): iterable
    {
        // TODO régler le bug de save

        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('libelle', 'Libéllé'),
            TextField::new('infos', 'Infos'),
            TextField::new('horaire', 'Horaire'), // TODO Changer selon si horaire est un string ou pas
            AssociationField::new('vigneronsCru', 'Vignerons')->setFormTypeOption('choice_label', function ($vigneron) {
                return $vigneron->getNomPrenom();
            })
                ->setFormTypeOption('query_builder', function (EntityRepository $ep) {
                    return $ep->createQueryBuilder('c')->orderBy('c.nom', 'ASC');
                })
                ->formatValue(function ($value, $entity) {
                    if (null != $entity->getVigneronsCru()[0]) {
                        // Affiche ... si il y a plus d'un vignerons
                        if (count($entity->getVigneronsCru()) > 1) {
                            return $entity->getVigneronsCru()[0]->getNom().' '.$entity->getVigneronsCru()[0]->getPrenom().'...';
                        }
                        return $entity->getVigneronsCru()[0]->getNom().' '.$entity->getVigneronsCru()[0]->getPrenom();
                    }

                    return 'Pas de vignerons';
                }),
            ImageField::new('image', 'Image de la carte')
                ->setUploadDir('public/uploads/img/crus/')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
                ->onlyOnForms(),
        ];
    }
}
