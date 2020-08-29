<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bootstrap", defaults={"_project": "bootstrap"})
 */
class BootstrapController extends AbstractController
{
    /**
     * @Route("/", name="bootstrap_start_index")
     */
    public function index()
    {
        return $this->render('bootstrap/start/index.html.twig');
    }
    
    /**
     * @Route("/examples/album", name="examples_album")
     */
    public function album()
    {
        return $this->render('bootstrap/examples/album.html.twig');
    }

    /**
     * @Route("/examples/pricing", name="examples_pricing")
     */
    public function pricing()
    {
        return $this->render('bootstrap/examples/pricing.html.twig');
    }

    /**
     * @Route("/components/carousel", name="components_carousel")
     */
    public function carousel()
    {
        return $this->render('bootstrap/components/carousel.html.twig');
    }
    
    /**
     * @Route("/components/buttons", name="components_buttons")
     */
    public function buttons()
    {
        return $this->render('bootstrap/components/buttons.html.twig');
    }

    /**
     * @Route("/components/section", name="components_section")
     */
    public function section()
    {
        return $this->render('bootstrap/components/section.html.twig');
    }

    /**
     * @Route("/components/shadow", name="components_shadow")
     */
    public function shadow()
    {
        return $this->render('bootstrap/components/shadow.html.twig');
    }
}
