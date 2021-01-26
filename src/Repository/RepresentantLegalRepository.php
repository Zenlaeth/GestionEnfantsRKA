<?php

namespace App\Repository;

use App\Entity\RepresentantLegal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RepresentantLegal|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepresentantLegal|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepresentantLegal[]    findAll()
 * @method RepresentantLegal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepresentantLegalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepresentantLegal::class);
    }

    // /**
    //  * @return RepresentantLegal[] Returns an array of RepresentantLegal objects
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
    public function findOneBySomeField($value): ?RepresentantLegal
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
