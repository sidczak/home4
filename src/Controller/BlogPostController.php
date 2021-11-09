<?php

namespace App\Controller;

use App\Entity\BlogPost;
use App\Repository\BlogPostRepository;
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
    public function index(BlogPostRepository $blogPostRepository): Response
    {
        return $this->render('blog/post/index.html.twig', [
            'blog_posts' => $blogPostRepository->findAll(),
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
     * @Route("/{id}", name="blog_post_show", methods={"GET"})
     */
    public function show(BlogPost $blogPost): Response
    {
        return $this->render('blog/post/show.html.twig', [
            'blog_post' => $blogPost,
        ]);
    }
}
