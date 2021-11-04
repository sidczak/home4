<?php

namespace App\DataFixtures;

use App\Entity\BlogImage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BlogImageFixtures extends Fixture implements DependentFixtureInterface
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

        $img_shop_1 = new BlogImage();
        $img_shop_1->setPost($manager->merge($this->getReference('post-shop')));
        $img_shop_1->setImage('range-rover-sport-950x530-lg.jpg');
        $img_shop_1->setRank(1);

        $img_shop_2 = new BlogImage();
        $img_shop_2->setPost($manager->merge($this->getReference('post-shop')));
        $img_shop_2->setImage('range-rover-sport-950x530-2-lg.jpg');
        $img_shop_2->setRank(3);

        $img_shop_3 = new BlogImage();
        $img_shop_3->setPost($manager->merge($this->getReference('post-shop')));
        $img_shop_3->setImage('range-rover-sport-950x530-3-lg.jpg');
        $img_shop_3->setRank(2);
            
        $manager->persist($img_shop_1);
        $manager->persist($img_shop_2);
        $manager->persist($img_shop_3);

        foreach (range(0, 30) as $i) { //mamy 30 postów dlatego rand(0, 30)
                         
            $random_image = $this->getRandomImage();
            
            if ($random_image) {
                $img = new BlogImage();

                $post = $this->getReference('post-post'.$i);
                $img->setPost($manager->merge($post));
                $img->setImage($random_image);
                $img->setRank(1);
            }
            /*
            switch ($post->getCategory()) {
                case $this->getReference('category-blog'):
                    $img->setImage('porsche-cayman-gt4-950x530-lg.jpg');
                    break;
                case $this->getReference('category-shop'):
                    $img->setImage('range-rover-sport-950x530-lg.jpg');
                    break;
                default:
                   $img->setImage(null);
            }
            */
            $manager->persist($img);
        }

        $manager->flush();
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

    private function getRandomImage()
    {
        
        $image = array(
            'aston-martin-vantage-950x530-lg.jpg',
            'bmw-coupe-950x530-lg.jpg',
            'mercedes-coupe-950x530-lg.jpg',
            'porsche-911-gt3-950x530-lg.jpg',
            'porsche-cayman-gt4-950x530-lg.jpg',
            'range-rover-sport-950x530-lg.jpg',
            null,
        );

        return $image[array_rand($image)];
    }
}
