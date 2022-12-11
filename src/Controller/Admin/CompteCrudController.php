<?php

namespace App\Controller\Admin;

use App\Entity\Compte;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CompteCrudController extends AbstractCrudController
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public static function getEntityFqcn(): string
    {
        return Compte::class;
    }

    public function setUserPassword(Compte $compte): void
    {
        if ($mdp = $this->getContext()->getRequest()->get('Compte')['password']) {
            $compte->setPassword($this->hasher->hashPassword($compte, $mdp));
        }
    }

    public function persistEntity(\Doctrine\ORM\EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($name = $this->getContext()->getRequest()->get('Compte')['email']) {
            $entityInstance->setEmail($name);
        }
        if ($login = $this->getContext()->getRequest()->get('Compte')['login']) {
            $entityInstance->setLogin($login);
        }
        if ($role = $this->getContext()->getRequest()->get('Compte')['roles']) {
            $entityInstance->setRoles($role);
        }
        if ($datenaiss = $this->getContext()->getRequest()->get('Compte')['datenaiss']) {
            dump($datenaiss);
            $date = (new \DateTime())->createFromFormat('Y-m-d', $datenaiss);
            dump($date);

            $entityInstance->setDateNaiss($date);
        }
        if (array_key_exists('is_verified', $isVerified = $this->getContext()->getRequest()->get('Compte'))) {
            if ($isVerified = $this->getContext()->getRequest()->get('Compte')['is_verified']) {
                $entityInstance->setIsVerified($isVerified);
            }
        }

        $this->setUserPassword($entityInstance);

        parent::persistEntity($entityManager, $entityInstance); // TODO: Change the autogenerated stub
    }

    public function configureFields(string $pageName): iterable
    {
        $roles = ['Administrateur' => 'ROLE_ADMIN', 'Utilisateur' => 'ROLE_USER', 'Premium' => 'ROLE_PREMIUM'];

        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email', 'Email'),
            TextField::new('login', 'Login'),
            TextField::new('password', 'Mot de passe')
                ->hideWhenUpdating()
                ->hideOnIndex()
                ->setFormType(PasswordType::class),
            DateField::new('datenaiss', 'Date de naissance'),
            ChoiceField::new('roles')
            ->setChoices($roles)
            ->allowMultipleChoices()
            ->onlyOnForms(),
            ArrayField::new('roles', 'Roles')->formatValue(function ($value, $entity) {
                if ('ROLE_ADMIN' == $entity->getRoles()[0]) {
                    return '<span CLASS="fa-solid fa-person-military-pointing"></span>';
                } elseif ('ROLE_PREMIUM' == $entity->getRoles()[0]) {
                    return '<span CLASS="fa-solid fa-person-rays"></span>';
                } else {
                    return '<span CLASS="fa-solid fa-person"></span>';
                }
            })->hideOnForm(),
            BooleanField::new('is_verified', 'Est vérifié'),
        ];
    }
}
