<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/vue", defaults={"_project": "vue"})
 */
class VueController extends AbstractController
{
    /**
     * @Route("/", name="vue_start_index")
     */
    public function index()
    {
        return $this->render('vue/start/index.html.twig');
    }
    
    /**
     * @Route("/examples/album", name="vue_examples_album")
     */
    public function album()
    {
        return $this->render('vue/examples/album.html.twig');
    }
    
    /**
     * @Route("/examples/browser", name="vue_examples_browser")
     */
    public function browser()
    {
        return $this->render('vue/examples/browser.html.twig');
    }
}
