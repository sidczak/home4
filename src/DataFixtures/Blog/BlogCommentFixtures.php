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

        foreach (range(0, 60) as $i) {

            $comment = new BlogComment();
            $comment->setPost($manager->merge($this->getReference('post-post'.rand(0, 30)))); //mamy 30 postów dlatego rand(0, 30)
            
            $surfer = $this->getRandomSurfer();
            $comment->setUsername($surfer['username']);
            $comment->setAuthorEmail($surfer['author_email']);
            
            $comment->setWebsite($this->getRandomWebsite());
            $comment->setContent($this->getRandomContent());
             
            $comment->setIsApproved(rand(0,1) == 0 ? 0 : 1);
            $comment->setPublishedAt(new \DateTime('now - '.rand(1,4).'days'));
            
            $manager->persist($comment);
        }

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

    private function getRandomSurfer()
    {
        
        $user = array(
            array(
                'username' => 'admin', 
                'author_email' => 'admin@symfony.com'),
            array(
                'username' => 'editor', 
                'author_email' => 'editor@symfony.com'),
            array(
                'username' => 'journalist', 
                'author_email' => 'journalist@symfony.com'),
            array(
                'username' => 'guest', 
                'author_email' => 'guest@symfony.com'),
            array(
                'username' => 'user one', 
                'author_email' => 'user_one@symfony.com'),
            array(
                'username' => 'user two', 
                'author_email' => 'user_two@symfony.com'),
            array(
                'username' => 'user three', 
                'author_email' => 'user_three@symfony.com'),
        );

        return $user[array_rand($user)];
    }
    
    private function getRandomWebsite()
    {
        
        $website = array(
            'www.demo.pl',
            'www.blog.pl',
            null,
            'www.shop.pl',
            'www.forum.pl',
        );

        return $website[array_rand($website)];
    }
    
    private function getPhrases()
    {
        return array(
            'Lorem ipsum dolor sit amet consectetur adipiscing elit.',
            'Pellentesque vitae velit ex.',
            'Mauris dapibus risus quis suscipit vulputate. Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et **dolore magna aliqua**: Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'Eros diam egestas libero eu vulputate risus.',
            'In hac habitasse platea dictumst.',
            'Morbi tempus commodo mattis. Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et **dolore magna aliqua**: Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'Ut suscipit posuere justo at vulputate.',
            'Ut eleifend mauris et risus ultrices egestas.',
            'Aliquam sodales odio id eleifend tristique. Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et **dolore magna aliqua**: Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'Urna nisl sollicitudin id varius orci quam id turpis.',
            'Nulla porta lobortis ligula vel egestas.',
            'Curabitur aliquam euismod dolor non ornare. Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et **dolore magna aliqua**: Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'Sed varius a risus eget aliquam.',
            'Nunc viverra elit ac laoreet suscipit.',
            'Pellentesque et sapien pulvinar consectetur. Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et **dolore magna aliqua**: Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        );
    }
    
    private function getRandomContent()
    {
        $content = $this->getPhrases();
        
        return $content[array_rand($content)];
    }
}
