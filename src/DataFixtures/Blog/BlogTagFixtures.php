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

	    $manager->persist($html);
        $manager->persist($css);
	    $manager->persist($jquery);

        $manager->flush();

        $this->addReference('tag-html', $html);
	    $this->addReference('tag-css', $css);
	    $this->addReference('tag-jquery', $jquery);
    }
}
