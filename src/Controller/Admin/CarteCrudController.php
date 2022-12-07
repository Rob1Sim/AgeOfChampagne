<?php

namespace App\Controller\Admin;

use App\Entity\Carte;
use Doctrine\ORM\EntityRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AvatarField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CarteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Carte::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            TextField::new("type"),
            TextField::new("cru"),
            TextField::new("region"),
            NumberField::new("latitude"),
            NumberField::new("longitude"),
            NumberField::new("superficie"),
            AssociationField::new("vignerons")->setFormTypeOption('choice_label','nom')
                ->setFormTypeOption('query_builder',function(EntityRepository $ep){
                    return $ep->createQueryBuilder('c')->orderBy('c.nom','ASC');
                })
                ->formatValue(function ($value,$entity){
                return $entity->getVignerons()->getNom()." ".$entity->getVignerons()->getPrenom();
            }),
            AvatarField::new("contenuImage")->hideOnIndex()
        ];
    }

}
