<?php

namespace App\Repository;

use App\Entity\Maladies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Maladies|null find($id, $lockMode = null, $lockVersion = null)
 * @method Maladies|null findOneBy(array $criteria, array $orderBy = null)
 * @method Maladies[]    findAll()
 * @method Maladies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaladiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Maladies::class);
    }

    // /**
    //  * @return Maladies[] Returns an array of Maladies objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Maladies
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
