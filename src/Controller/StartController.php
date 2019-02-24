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
}