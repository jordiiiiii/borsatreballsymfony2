<?php

namespace App\Repository;

use App\Entity\Registres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Registres|null find($id, $lockMode = null, $lockVersion = null)
 * @method Registres|null findOneBy(array $criteria, array $orderBy = null)
 * @method Registres[]    findAll()
 * @method Registres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Registres::class);
    }

    // /**
    //  * @return Registres[] Returns an array of Registres objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Registres
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
