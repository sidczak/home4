<?php

namespace App\Repository;

use App\Entity\BlogImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BlogImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlogImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlogImage[]    findAll()
 * @method BlogImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlogImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlogImage::class);
    }

    public function getMaxRank($postId)
    {
        return $this->createQueryBuilder('i')
        	->select('MAX(i.rank) as rank')
            ->where('i.post = :postId')
            ->setParameter('postId', $postId)
            ->getQuery()
            ->getSingleResult();
    }
    
    /**
     * @param int|null $postId
     *
     * @return BlogImage[]
     */
    public function updateRank(int $postId = null)
    {
        return $this->createQueryBuilder('i')
            ->where('i.post = :postId')
            ->setParameter('postId', $postId)
            ->orderBy('i.rank', 'ASC')
        	->getQuery()
        	->getResult();
    }

    public function findImageWithWhichChange(int $rank, int $postId)
    {
        return $this->createQueryBuilder('i')
            ->where('i.rank = :rank')
            ->setParameter('rank', $rank)
            ->andWhere('i.post = :postId')
            ->setParameter('postId', $postId)
            ->getQuery()
            ->getSingleResult();
    }

    // /**
    //  * @return BlogImage[] Returns an array of BlogImage objects
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
    public function findOneBySomeField($value): ?BlogImage
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
