<?php

namespace App\Repository;

use App\Entity\ChequeVacances;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChequeVacances|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChequeVacances|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChequeVacances[]    findAll()
 * @method ChequeVacances[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChequeVacancesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChequeVacances::class);
    }

    // /**
    //  * @return ChequeVacances[] Returns an array of ChequeVacances objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ChequeVacances
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
