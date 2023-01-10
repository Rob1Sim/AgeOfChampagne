<?php

namespace App\Controller\Admin;

use App\Entity\Animation;
use App\Entity\Vigneron;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AnimationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Animation::class;
    }


    public function configureFields(string $pageName): iterable
    {
        // TODO régler le bug de save

        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('type', 'Type'),
            TextField::new('nom', 'Nom'),
            DateTimeField::new('horaireDeb', 'Horaire de début')->setTimezone('Europe/Paris'),
            DateTimeField::new('horaireFin', 'Horaire de fin')->setTimezone('Europe/Paris'),
            MoneyField::new('prix', 'Prix')->setCurrency('EUR'),
            AssociationField::new('vigneronsAnim', 'Vignerons')->setFormTypeOption('choice_label', function ($vigneron) {
                return $vigneron->getNomPrenom();
            })
                ->setFormTypeOption('query_builder', function (EntityRepository $ep) {
                    return $ep->createQueryBuilder('c')->orderBy('c.nom', 'ASC');
                })
                ->formatValue(function ($value, $entity) {
                    if (null != $entity->getVigneronsAnim()[0]) {
                        // Affiche ... si il y a plus d'un vignerons
                        if (count($entity->getVigneronsAnim()) > 1) {
                            return $entity->getVigneronsAnim()[0]->getNom().' '.$entity->getVigneronsAnim()[0]->getPrenom().'...';
                        }

                        return $entity->getVigneronsAnim()[0]->getNom().' '.$entity->getVigneronsAnim()[0]->getPrenom();
                    }

                    return 'Pas de vignerons';
                }),
            ImageField::new('contenuImage', "Image de l'animation")
                ->setUploadDir('public/uploads/img/')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
                ->onlyOnForms()
                ->addHtmlContentsToBody("<script src='js/animation.js' ></script>"),
        ];
    }

}
