<?php

namespace App\DataFixtures\Blog;

use App\Entity\Blog\BlogImage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BlogImageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $img_blog_1 = new BlogImage();
        $img_blog_1->setPost($manager->merge($this->getReference('post-blog')));
        $img_blog_1->setImage('porsche-cayman-gt4-950x530-lg.jpg');
        $img_blog_1->setRank(1);

        $img_blog_2 = new BlogImage();
        $img_blog_2->setPost($manager->merge($this->getReference('post-blog')));
        $img_blog_2->setImage('porsche-cayman-gt4-950x530-2-lg.jpg');
        $img_blog_2->setRank(3);

        $img_blog_3 = new BlogImage();
        $img_blog_3->setPost($manager->merge($this->getReference('post-blog')));
        $img_blog_3->setImage('porsche-cayman-gt4-950x530-3-lg.jpg');
        $img_blog_3->setRank(2);

        $img_blog_4 = new BlogImage();
        $img_blog_4->setPost($manager->merge($this->getReference('post-blog')));
        $img_blog_4->setImage('porsche-cayman-gt4-950x530-4-lg.jpg');
        $img_blog_4->setRank(4);
            
        $manager->persist($img_blog_1);
        $manager->persist($img_blog_2);
        $manager->persist($img_blog_3);
        $manager->persist($img_blog_4);

        $manager->flush();
    }
}
