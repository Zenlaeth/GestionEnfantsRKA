<?php

namespace App\Repository;

use App\Entity\AnnulationFacturation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AnnulationFacturation|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnnulationFacturation|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnnulationFacturation[]    findAll()
 * @method AnnulationFacturation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnulationFacturationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnnulationFacturation::class);
    }

    public function findAll()
    {
        return $this->findBy(array(), array('id' => 'DESC'));
    }

    // /**
    //  * @return AnnulationFacturation[] Returns an array of AnnulationFacturation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnnulationFacturation
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
