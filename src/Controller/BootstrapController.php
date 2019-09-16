<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bootstrap/examples")
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
}
