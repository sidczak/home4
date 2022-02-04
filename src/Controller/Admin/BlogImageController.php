<?php

namespace App\Controller\Admin;

use App\Entity\BlogImage;
use App\Repository\BlogImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("admin/blog/image")
 */
class BlogImageController extends AbstractController
{
    /**
     * @Route("/{id}/{img}/remove-image", name="admin_blog_image_remove", methods={"GET"})
     */
    public function removeImage(int $id, int $img, BlogImageRepository $blogImageRepository): Response
    {
        // $image = $this->getDoctrine()
        //     ->getRepository(BlogImage::class)
        //     ->find($img);

        $image = $blogImageRepository->find($img);

        if (!$image) {
            throw $this->createNotFoundException('The image does not exist');
        }

        $file = $this->getParameter('project_dir') . '/public/images/blog/' . $image->getImage();

        if (file_exists($file)) {
            unlink($file);
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($image);
        $entityManager->flush();

        $images = $blogImageRepository->updateRank($id);
        if ($images) {
            $rank = 0;
            foreach ($images as $image) {
                $image->setRank(++$rank);
                $entityManager->persist($image);
            }
        }
        $entityManager->flush();
        
        return $this->redirect($this->generateUrl('admin_blog_post_edit', ['id' => $id]));
    }

    /**
     * @Route("/{id}/{img}/up-image", name="admin_blog_image_up", methods={"GET"})
     */
    public function upImage(int $id, int $img, BlogImageRepository $blogImageRepository): Response
    {
        // $entity = $this->getDoctrine()
        //     ->getRepository(BlogImage::class)
        //     ->find($img);

        $entity = $blogImageRepository->find($img);

        if (!$entity) {
            throw $this->createNotFoundException('The image does not exist');
        }

        $rank = $entity->getRank();

        // $repository = $this->getDoctrine()
        //     ->getRepository(BlogImage::class);

        // $query = $repository->createQueryBuilder('i')
        //     ->where('i.rank = :rank')
        //     ->setParameter('rank', $rank - 1)
        //     ->andWhere('i.post = :post_id')
        //     ->setParameter('post_id', $id)
        //     ->getQuery();

        // $image = $query->getSingleResult();

        $image = $blogImageRepository->findImageWithWhichChange($rank - 1, $id);
        $image->setRank($rank);

        $entity->setRank($rank - 1);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($entity);
        $entityManager->persist($image);
        $entityManager->flush();
        
        return $this->redirect($this->generateUrl('admin_blog_post_edit', ['id' => $id]));
    }

    /**
     * @Route("/{id}/{img}/down-image", name="admin_blog_image_down", methods={"GET"})
     */
    public function downImage(int $id, int $img, BlogImageRepository $blogImageRepository): Response
    {
        // $entity = $this->getDoctrine()
        //     ->getRepository(BlogImage::class)
        //     ->find($img);

        $entity = $blogImageRepository->find($img);

        if (!$entity) {
            throw $this->createNotFoundException('The image does not exist');
        }

        $rank = $entity->getRank();

        // $repository = $this->getDoctrine()
        //     ->getRepository(BlogImage::class);

        // $query = $repository->createQueryBuilder('i')
        //     ->where('i.rank = :rank')
        //     ->setParameter('rank', $rank + 1)
        //     ->andWhere('i.post = :post_id')
        //     ->setParameter('post_id', $id)
        //     ->getQuery();

        // $image = $query->getSingleResult();

        $image = $blogImageRepository->findImageWithWhichChange($rank + 1, $id);
        $image->setRank($rank);

        $entity->setRank($rank + 1);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($entity);
        $entityManager->persist($image);
        $entityManager->flush();
        
        return $this->redirect($this->generateUrl('admin_blog_post_edit', ['id' => $id]));
    }

}