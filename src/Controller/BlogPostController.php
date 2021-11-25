<?php

namespace App\Controller;

use App\Entity\BlogPost;
use App\Repository\BlogPostRepository;
use App\Repository\BlogCategoryRepository;
use App\Repository\BlogTagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Route("/blog/post")
 */
class BlogPostController extends AbstractController
{
    /**
     * @Route("/", name="blog_post_index", methods={"GET"})
     */
    public function index(BlogPostRepository $blogPostRepository, BlogCategoryRepository $blogCategoryRepository, BlogTagRepository $blogTagRepository): Response
    {
        // $blogPosts = $blogPostRepository->findAll();
        $blogPosts = $blogPostRepository->findLatest();
        $blogCategories = $blogCategoryRepository->findCategoryWithPosts();
        $blogTags = $blogTagRepository->findTagWithPosts();
        // $recent_posts = $blogPostRepository->findBy(array(), array(), 5);

        return $this->render('blog/post/index.html.twig', [
            'blog_posts' => $blogPosts,
            'blog_categories' => $blogCategories,
            'blog_tags' => $blogTags,
            // 'recent_posts' => $recent_posts,
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
    public function show(BlogPost $blogPost, BlogCategoryRepository $blogCategoryRepository, BlogTagRepository $blogTagRepository): Response
    {

        $blogCategories = $blogCategoryRepository->findCategoryWithPosts();
        $blogTags = $blogTagRepository->findTagWithPosts();

        // session recently viewed posts
        $session = new Session();
        $session->start();
        $posts = $session->get('recently_viewed_posts', array());

        $post = array(
            'id' => $blogPost->getId(), 
            'title' =>$blogPost->getTitle(),
            'category' =>$blogPost->getCategory()->getSlug(), 
            'slug' => $blogPost->getSlug(), 
        );

        if (!in_array($post, $posts)) {
            array_unshift($posts, $post);     
            $session->set('recently_viewed_posts', array_slice($posts, 0, 3));
        }
        // end session recently viewed posts

        return $this->render('blog/post/show.html.twig', [
            'blog_post' => $blogPost,
            'blog_categories' => $blogCategories,
            'blog_tags' => $blogTags,
        ]);
    }
}
