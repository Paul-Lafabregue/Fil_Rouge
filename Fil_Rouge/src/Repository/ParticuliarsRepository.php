<?php

namespace App\Repository;

use App\Entity\Particuliars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Particuliars|null find($id, $lockMode = null, $lockVersion = null)
 * @method Particuliars|null findOneBy(array $criteria, array $orderBy = null)
 * @method Particuliars[]    findAll()
 * @method Particuliars[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticuliarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Particuliars::class);
    }

    // /**
    //  * @return Particuliars[] Returns an array of Particuliars objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Particuliars
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
