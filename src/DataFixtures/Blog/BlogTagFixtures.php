<?php

namespace App\DataFixtures\Blog;

use App\Entity\Blog\BlogTag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BlogTagFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $html = new BlogTag();
        $html->setName('HTML 5');
        $html->setDescription('Description HTML 5');
        
        $css = new BlogTag();
        $css->setName('CSS 3');
        $css->setDescription('Description CSS 3');
        
        $jquery = new BlogTag();
        $jquery->setName('jQuery');
        $jquery->setDescription('Description jQuery');

        $php = new BlogTag();
        $php->setName('PHP');
        $php->setDescription('Description PHP');

        $ajax = new BlogTag();
        $ajax->setName('AJAX');
        $ajax->setDescription('Description AJAX');
            
        $symfony = new BlogTag();
        $symfony->setName('Symfony 2');
        $symfony->setDescription('Description Symfony 2');
            
        $bootstrap = new BlogTag();
        $bootstrap->setName('Bootstrap');
        $bootstrap->setDescription('Description Bootstrap');

        $manager->persist($html);
        $manager->persist($css);
        $manager->persist($jquery);
        $manager->persist($php);
        $manager->persist($ajax);
        $manager->persist($symfony);
        $manager->persist($bootstrap);

        $manager->flush();

        $this->addReference('tag-html', $html);
        $this->addReference('tag-css', $css);
        $this->addReference('tag-jquery', $jquery);
        $this->addReference('tag-php', $php);
        $this->addReference('tag-ajax', $ajax);
        $this->addReference('tag-symfony', $symfony);
        $this->addReference('tag-bootstrap', $bootstrap);
    }
}
