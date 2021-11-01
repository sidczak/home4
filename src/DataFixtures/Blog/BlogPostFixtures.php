<?php

namespace App\DataFixtures\Blog;

use App\Entity\Blog\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BlogPostFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
	    $post_blog = new BlogPost();
        $post_blog->setCategory($manager->merge($this->getReference('category-blog'))); //manyToOne
	    $post_blog->setTitle('Learn the Bootstrap Grid in <b>15 Minutes</b>');
        // $post_blog->setExcerpt($this->getPostExcerpt());
        // $post_blog->setContent($this->getPostContent());
        $post_blog->setExcerpt('Bootstrap is the most widely used frontend framework right now.');
        $post_blog->setContent('Bootstrap is the most widely used frontend framework right now. When it comes to building responsive websites and apps, it’s the first choice of both professionals and hobbyists because of how simple it is to work with. Anybody who knows HTML, CSS and a bit of JavaScript can learn Bootstrap in no time.');
        $post_blog->setAuthorEmail('admin@symfony.com');
        $post_blog->setViewsPost(10);
        $post_blog->addTag($manager->merge($this->getReference('tag-html'))); //manyToMany
        $post_blog->addTag($manager->merge($this->getReference('tag-css'))); //manyToMany
        $post_blog->setPublishedAt(new \DateTime('now - 1 days'));
            
        $post_shop = new BlogPost();
        $post_shop->setCategory($manager->merge($this->getReference('category-shop'))); //manyToOne
	    $post_shop->setTitle('How to Control <b>YouTube Video Player</b> with jQuery');
        // $post_shop->setExcerpt($this->getPostExcerpt());
        // $post_shop->setContent($this->getPostContent());
        $post_shop->setExcerpt('YouTube has become the standard way for delivering high quality video on the web.');
        $post_shop->setContent('YouTube has become the standard way for delivering high quality video on the web. Sometimes, when you embed a video in your web application or landing page, you need a great deal of control on what and how is displayed. This is why we are going to show you how you can use the YouTube JavaScript Player API.');
        $post_shop->setAuthorEmail('journalist@symfony.com');
        $post_shop->setViewsPost(5);
        $post_shop->addTag($manager->merge($this->getReference('tag-html'))); //manyToMany
        $post_shop->addTag($manager->merge($this->getReference('tag-php'))); //manyToMany
        // $post_shop->addTag($manager->merge($this->getReference('tag-ajax'))); //manyToMany
        $post_shop->setPublishedAt(new \DateTime('now - 1 days'));
            
        $manager->persist($post_blog);
        $manager->persist($post_shop);

        $manager->flush();

        $this->addReference('post-blog', $post_blog);
        $this->addReference('post-shop', $post_shop);
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            BlogCategoryFixtures::class,
            BlogTagFixtures::class,
        ];
    }
}
