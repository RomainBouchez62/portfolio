<?php

namespace App\Repository;

use App\Entity\Diplome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Diplome|null find($id, $lockMode = null, $lockVersion = null)
 * @method Diplome|null findOneBy(array $criteria, array $orderBy = null)
 * @method Diplome[]    findAll()
 * @method Diplome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiplomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Diplome::class);
    }


    public function findByOrder(){
        return $this->createQueryBuilder('Order')
            ->orderBy('DESC')
            ->getQuery()
            ->getResult();
    }
     /**
      * @return Diplome[] Returns an array of Diplome objects
      */

    public function findOrderBy()
    {
        return $this->createQueryBuilder('d')
            ->orderBy('d.dateObtentionDiplome', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Diplome
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
