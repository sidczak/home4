<?php

namespace App\Controller;

use App\Entity\BlogCategory;
use App\Form\BlogCategoryType;
use App\Repository\BlogPostRepository;
use App\Repository\BlogCategoryRepository;
use App\Repository\BlogTagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/blog/category")
 */
class BlogCategoryController extends AbstractController
{
    /**
     * @Route("/{id}/{category_slug}/{page}", name="blog_category_show", methods={"GET"}, defaults={"page": 1}, requirements={"page" = "\d+"})
     */
    public function show(
        BlogCategory $blogCategory, 
        BlogCategoryRepository $blogCategoryRepository, 
        BlogPostRepository $blogPostRepository, 
        BlogTagRepository $blogTagRepository, 
        PaginatorInterface $paginator, int $page): Response
    {
        $blogCategories = $blogCategoryRepository->findCategoryWithPosts();
        // $blogPosts = $blogPostRepository->findPostsWithCategory($blogCategory->getId());
        $blogPosts = $paginator->paginate(
            $blogPostRepository->findPostsWithCategory($blogCategory->getId()),
            $page,
            $this->getParameter('max_blog_posts_on_page')
        );
        $blogTags = $blogTagRepository->findTagWithPosts();

        return $this->render('blog/category/show.html.twig', [
            'blog_category' => $blogCategory,
            'blog_categories' => $blogCategories,
            'blog_posts' => $blogPosts,
            'blog_tags' => $blogTags,
        ]);
    }

}
