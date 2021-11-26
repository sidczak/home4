<?php

namespace App\Repository;

use App\Entity\BlogPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BlogPost|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlogPost|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlogPost[]    findAll()
 * @method BlogPost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlogPostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlogPost::class);
    }

    public function findLatest()
    {
        return $this->createQueryBuilder('p')
            ->addSelect('pt', 'i')
            ->innerJoin('p.tags', 'pt')
            ->innerJoin('p.images', 'i')
            ->orderBy('p.publishedAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param int|null $categoryId
     *
     * @return BlogPost[]
     */
    public function findPostsWithCategory(int $categoryId = null)
    {
        $qb = $this->createQueryBuilder('p')
            ->addSelect('pt', 'i')
            ->innerJoin('p.tags', 'pt')
            ->innerJoin('p.images', 'i')
            ->orderBy('p.publishedAt', 'DESC');

        if ($categoryId) {
            $qb->andWhere('p.category = :categoryId')
                ->setParameter('categoryId', $categoryId);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * @param int|null $tagId
     *
     * @return BlogPost[]
     */
    public function findPostsWithTag(int $tagId = null)
    {
        $qb = $this->createQueryBuilder('p')
            ->addSelect('pt', 'i')
            ->innerJoin('p.tags', 'pt')
            ->innerJoin('p.images', 'i')
            ->orderBy('p.publishedAt', 'DESC');

        if ($tagId) {
            $qb->andWhere(':tag MEMBER OF p.tags')
                ->setParameter('tag', $tagId);
        }
        
        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return BlogPost[] Returns an array of BlogPost objects
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
    public function findOneBySomeField($value): ?BlogPost
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
