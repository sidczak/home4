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
    
    // /**
    //  * @Route("/examples/album", name="vue_examples_album")
    //  */
    // public function album()
    // {
    //     return $this->render('vue/examples/album.html.twig');
    // }
}
