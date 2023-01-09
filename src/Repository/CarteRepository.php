<?php

namespace App\Repository;

use App\Entity\Carte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Carte>
 *
 * @method Carte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Carte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Carte[]    findAll()
 * @method Carte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Carte::class);
    }

    public function save(Carte $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Carte $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Carte[]
     */
    public function search(string $value = ''): array
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.nom LIKE :value')
            ->setParameter('value', '%'.$value.'%')
            ->orderBy('c.nom', 'ASC');

        return $qb->getQuery()->getResult();
    }

    /**
     * @return Carte[]
     */
    public function byCategory(string $value = ''): array
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.category = :value')
            ->setParameter('value', $value)
            ->orderBy('c.nom', 'ASC');

        return $qb->getQuery()->getResult();
    }

    /**
     * @return int[]
     */
    public function getLastCardsId(): array
    {
        session_start();

        return $_SESSION['LAST_CARDS'];
    }

    public function addToCardList(int $carteId): void
    {
        session_start();
        if ('' != $_SESSION['LAST_CARDS']) {
            if (in_array($carteId, $_SESSION['LAST_CARDS'])) {
                $this->extracted($carteId);
            } else {
                if ($this->count($_SESSION['LAST_CARDS']) == 10) {
                    if (in_array($carteId, $_SESSION['LAST_CARDS'])) {
                        $this->extracted($carteId);
                    } else {
                    }
                }
            }
        }
    }

    public function replaceExistingCard(int $carteId): void
    {
        for ($i = 0; $i < $this->count($_SESSION['LAST_CARDS']); ++$i) {
            if ($_SESSION['LAST_CARDS'][$i] == $carteId) {
                unset($_SESSION['LAST_CARDS']);
                $_SESSION['LAST_CARDS'] = array_values($_SESSION['LAST_CARDS']);
            }
        }
        array_unshift($_SESSION['LAST_CARDS'], $carteId);
    }
}

//    /**
//     * @return Carte[] Returns an array of Carte objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Carte
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }/**

