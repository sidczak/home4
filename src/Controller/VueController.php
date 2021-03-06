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

    /**
     * @Route("/examples/sound-card", name="vue_examples_sound_card")
     */
    public function soundCard()
    {
        return $this->render('vue/examples/sound_card.html.twig');
    }

    /**
     * @Route("/examples/resize", name="vue_examples_resize")
     */
    public function resize()
    {
        return $this->render('vue/examples/resize.html.twig');
    }

    /**
     * @Route("/examples/scroll", name="vue_examples_scroll")
     */
    public function scroll()
    {
        return $this->render('vue/examples/scroll.html.twig');
    }

    /**
     * @Route("/examples/scroll-progress", name="vue_examples_scroll_progress")
     */
    public function scrollProgress()
    {
        return $this->render('vue/examples/scroll_progress.html.twig');
    }

    /**
     * @Route("/examples/zoom", name="vue_examples_zoom")
     */
    public function zoom()
    {
        return $this->render('vue/examples/zoom.html.twig');
    }
    
    /**
     * @Route("/examples/transition", name="vue_examples_transition")
     */
    public function transition()
    {
        return $this->render('vue/examples/transition.html.twig');
    }

    /**
     * @Route("/examples/transition-group", name="vue_examples_transition_group")
     */
    public function transitionGroup()
    {
        return $this->render('vue/examples/transition_group.html.twig');
    }

    /**
     * @Route("/examples/waves", name="vue_examples_waves")
     */
    public function waves()
    {
        return $this->render('vue/examples/waves.html.twig');
    }

    /**
     * @Route("/components/modal", name="vue_components_modal")
     */
    public function modal()
    {
        return $this->render('vue/components/modal.html.twig');
    }

    /**
     * @Route("/components/map", name="vue_components_map")
     */
    public function map()
    {
        return $this->render('vue/components/map.html.twig');
    }
}
