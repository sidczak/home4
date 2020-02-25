<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/symfony", defaults={"_project": "symfony"})
 */
class SymfonyController extends AbstractController
{
    /**
     * @Route("/", name="symfony_start_index")
     */
    public function index()
    {
        return $this->render('symfony/start/index.html.twig');
    }
    
    // /**
    //  * @Route("/examples/album", name="symfony_examples_album")
    //  */
    // public function album()
    // {
    //     return $this->render('symfony/examples/album.html.twig');
    // }
}
