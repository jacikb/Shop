<?php

namespace App\Repository\Dictionary;

use App\Entity\StatusDictionary;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StatusDictionary|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatusDictionary|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatusDictionary[]    findAll()
 * @method StatusDictionary[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatusDictionaryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StatusDictionary::class);
    }

    // /**
    //  * @return StatusDictionary[] Returns an array of StatusDictionary objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StatusDictionary
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
