<?php

namespace App\Repository;

use App\Entity\ModificationFacturation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModificationFacturation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModificationFacturation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModificationFacturation[]    findAll()
 * @method ModificationFacturation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModificationFacturationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModificationFacturation::class);
    }

    public function findAll()
    {
        return $this->findBy(array(), array('id' => 'DESC'));
    }

    // /**
    //  * @return ModificationFacturation[] Returns an array of ModificationFacturation objects
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
    public function findOneBySomeField($value): ?ModificationFacturation
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
