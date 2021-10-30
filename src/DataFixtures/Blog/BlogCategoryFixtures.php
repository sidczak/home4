<?php

namespace App\DataFixtures\Blog;

use App\Entity\Blog\BlogCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BlogCategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $forum = new BlogCategory();
        $forum->setName('Forum tutorial');
        $forum->setDescription('Forum Description');
        $forum->setImage('forum.jpg');
        $forum->setIsActive(1);

        $blog = new BlogCategory();
        $blog->setName('Blog tutorial');
        $blog->setDescription('Blog Description');
        $blog->setImage('blog.jpg');
        $blog->setIsActive(1);

        $shop = new BlogCategory();
        $shop->setName('Shop tutorial');
        $shop->setDescription('Shop Description');
        $shop->setImage('shop.jpg');

        $manager->persist($forum);
        $manager->persist($blog);
        $manager->persist($shop);

        $manager->flush();

        $this->addReference('category-forum', $forum);
        $this->addReference('category-blog', $blog);
        $this->addReference('category-shop', $shop);
    }
}
