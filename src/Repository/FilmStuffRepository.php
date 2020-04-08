<?php

namespace App\Repository;

use App\Entity\FilmStuff;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FilmStuff|null find($id, $lockMode = null, $lockVersion = null)
 * @method FilmStuff|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilmStuff[]    findAll()
 * @method FilmStuff[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmStuffRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FilmStuff::class);
    }

    // /**
    //  * @return FilmStuff[] Returns an array of FilmStuff objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FilmStuff
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
