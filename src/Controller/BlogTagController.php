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

/**
 * @Route("/blog/tag")
 */
class BlogTagController extends AbstractController
{
    /**
     * @Route("/{id}/{tag_slug}", name="blog_tag_show", methods={"GET"})
     */
    public function show(BlogTag $blogTag, BlogTagRepository $blogTagRepository, BlogCategoryRepository $blogCategoryRepository, BlogPostRepository $blogPostRepository): Response
    {
        $blogTags = $blogTagRepository->findTagWithPosts();
        $blogCategories = $blogCategoryRepository->findCategoryWithPosts();
        $blogPosts = $blogPostRepository->findPostsWithTag($blogTag->getId());

        return $this->render('blog/tag/show.html.twig', [
            'blog_tag' => $blogTag,
            'blog_tags' => $blogTags,
            'blog_categories' => $blogCategories,
            'blog_posts' => $blogPosts,
        ]);
    }
}
