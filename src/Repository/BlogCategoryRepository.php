<?php

namespace App\Repository;

use App\Entity\BlogCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BlogCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlogCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlogCategory[]    findAll()
 * @method BlogCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlogCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlogCategory::class);
    }

    /**
     * @return Category[]
     */
    public function findCategoryWithPosts()
    {
        return $this->createQueryBuilder('c')
            ->select('c')
            ->innerJoin('c.posts', 'p')
            ->where('p.category = c.id')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return BlogCategory[] Returns an array of BlogCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BlogCategory
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


}
