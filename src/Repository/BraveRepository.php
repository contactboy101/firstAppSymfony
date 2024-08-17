<?php

namespace App\Repository;

use App\Entity\Brave;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Brave>
 *
 * @method Brave|null find($id, $lockMode = null, $lockVersion = null)
 * @method Brave|null findOneBy(array $criteria, array $orderBy = null)
 * @method Brave[]    findAll()
 * @method Brave[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BraveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Brave::class);
    }

//    /**
//     * @return Brave[] Returns an array of Brave objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Brave
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
