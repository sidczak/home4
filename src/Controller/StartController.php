<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class StartController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $reques)
    {
        return $this->render('start/index.html.twig');
    }

    /**
     * @Route("/banner", name="examples_banner")
     */
    public function banner()
    {
        return $this->render('start/banner.html.twig');
    }

    /**
     * @Route("/sitemap", name="start_sitemap")
     */
    public function sitemap()
    {
        return $this->render('start/sitemap.html.twig');
    }

    /**
     * @Route("/faq", name="start_faq")
     */
    public function faq()
    {
        return $this->render('start/faq.html.twig');
    }
    
    /**
     * @Route("/portfolio", name="start_portfolio")
     */
    public function portfolio()
    {
        return $this->render('start/portfolio.html.twig');
    }

    /**
     * @Route("/portfolio/project-detail", name="start_portfolio_detail")
     */
    public function portfolioDetail()
    {
        return $this->render('start/portfolio_detail.html.twig');
    }

    /**
     * @Route("/blog", name="start_blog")
     */
    public function blog()
    {
        return $this->render('start/blog.html.twig');
    }

    /**
     * @Route("/blog/post-detail", name="start_blog_detail")
     */
    public function blogDetail()
    {
        return $this->render('start/blog_detail.html.twig');
    }

    /**
     * @Route("/pricing", name="start_pricing")
     */
    public function pricing()
    {
        return $this->render('start/pricing.html.twig');
    }
}
