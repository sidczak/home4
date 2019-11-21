<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bootstrap/examples", defaults={"_project": "bootstrap"})
 */
class BootstrapController extends AbstractController
{
    /**
     * @Route("/", name="examples_bootstrap")
     */
    public function index()
    {
        return $this->render('bootstrap/index.html.twig');
    }
    
    /**
     * @Route("/album", name="examples_album")
     */
    public function album()
    {
        return $this->render('bootstrap/album.html.twig');
    }

    /**
     * @Route("/pricing", name="examples_pricing")
     */
    public function pricing()
    {
        return $this->render('bootstrap/pricing.html.twig');
    }

    /**
     * @Route("/resize", name="examples_resize")
     */
    public function resize()
    {
        return $this->render('bootstrap/resize.html.twig');
    }

    /**
     * @Route("/scroll", name="examples_scroll")
     */
    public function scroll()
    {
        return $this->render('bootstrap/scroll.html.twig');
    }
}
