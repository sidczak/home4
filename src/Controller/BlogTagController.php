<?php

namespace App\Controller;

use App\Entity\BlogTag;
use App\Form\BlogTagType;
use App\Repository\BlogTagRepository;
use App\Repository\BlogCategoryRepository;
use App\Repository\BlogPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/blog/tag")
 */
class BlogTagController extends AbstractController
{
    /**
     * @Route("/{id}/{tag_slug}/{page}", name="blog_tag_show", methods={"GET"}, defaults={"page": 1}, requirements={"page" = "\d+"})
     */
    public function show(
        BlogTag $blogTag, 
        BlogTagRepository $blogTagRepository, 
        BlogCategoryRepository $blogCategoryRepository, 
        BlogPostRepository $blogPostRepository, 
        PaginatorInterface $paginator, int $page): Response
    {
        $blogTags = $blogTagRepository->findTagWithPosts();
        $blogCategories = $blogCategoryRepository->findCategoryWithPosts();
        // $blogPosts = $blogPostRepository->findPostsWithTag($blogTag->getId());
        $blogPosts = $paginator->paginate(
            $blogPostRepository->findPostsWithTag($blogTag->getId()),
            $page,
            $this->getParameter('max_blog_posts_on_page')
        );

        return $this->render('blog/tag/show.html.twig', [
            'blog_tag' => $blogTag,
            'blog_tags' => $blogTags,
            'blog_categories' => $blogCategories,
            'blog_posts' => $blogPosts,
        ]);
    }
}
