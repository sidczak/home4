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

/**
 * @Route("/blog/category")
 */
class BlogCategoryController extends AbstractController
{
    /**
     * @Route("/{id}/{category_slug}", name="blog_category_show", methods={"GET"})
     */
    public function show(BlogCategory $blogCategory, BlogCategoryRepository $blogCategoryRepository, BlogPostRepository $blogPostRepository, BlogTagRepository $blogTagRepository): Response
    {
        $blogCategories = $blogCategoryRepository->findCategoryWithPosts();
        $blogPosts = $blogPostRepository->findPostsWithCategory($blogCategory->getId());
        $blogTags = $blogTagRepository->findTagWithPosts();

        return $this->render('blog/category/show.html.twig', [
            'blog_category' => $blogCategory,
            'blog_categories' => $blogCategories,
            'blog_posts' => $blogPosts,
            'blog_tags' => $blogTags,
        ]);
    }

}
