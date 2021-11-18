<?php

namespace App\Controller;

use App\Entity\BlogPost;
use App\Repository\BlogPostRepository;
use App\Repository\BlogCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog/post")
 */
class BlogPostController extends AbstractController
{
    /**
     * @Route("/", name="blog_post_index", methods={"GET"})
     */
    public function index(BlogPostRepository $blogPostRepository, BlogCategoryRepository $blogCategoryRepository): Response
    {
        $blogPosts = $blogPostRepository->findAll();
        $blogCategories = $blogCategoryRepository->findCategoryWithPosts();

        return $this->render('blog/post/index.html.twig', [
            'blog_posts' => $blogPosts,
            'blog_categories' => $blogCategories,
        ]);
    }
    
    // public function index(): Response
    // {
    //     $blogPosts = $this->getDoctrine()
    //         ->getRepository(BlogPost::class)
    //         ->findAll();

    //     return $this->render('blog/post/index.html.twig', [
    //         'blog_posts' => $blogPosts,
    //     ]);
    // }

    /**
     * @Route("/{id}/{category}/{title}/show", name="blog_post_show", methods={"GET"})
     */
    public function show(BlogPost $blogPost, BlogCategoryRepository $blogCategoryRepository): Response
    {

        $blogCategories = $blogCategoryRepository->findCategoryWithPosts();

        return $this->render('blog/post/show.html.twig', [
            'blog_post' => $blogPost,
            'blog_categories' => $blogCategories,
        ]);
    }
}
