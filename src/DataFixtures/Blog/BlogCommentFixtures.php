<?php

namespace App\DataFixtures\Blog;

use App\Entity\Blog\BlogComment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BlogCommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comment_blog = new BlogComment();
        $comment_blog->setPost($manager->merge($this->getReference('post-blog')));
        $comment_blog->setUsername('admin');
        $comment_blog->setAuthorEmail('admin@symfony.com');
        $comment_blog->setWebsite('www.demo.pl');
        $comment_blog->setContent('YouTube has become the standard way for delivering high quality video on the web.');
        // $comment_blog->setIsApproved(0);
        
        $comment_shop = new BlogComment();
        $comment_shop->setPost($manager->merge($this->getReference('post-shop')));
        $comment_shop->setUsername('journalist');
        $comment_shop->setAuthorEmail('journalist@symfony.com');
        $comment_shop->setContent('Bootstrap is the most widely used frontend framework right now.');
        
        $manager->persist($comment_blog);
        $manager->persist($comment_shop);

        $manager->flush();

        $this->addReference('comment-blog', $comment_blog);
        $this->addReference('comment-shop', $comment_shop);
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            BlogPostFixtures::class,
        ];
    }
}
