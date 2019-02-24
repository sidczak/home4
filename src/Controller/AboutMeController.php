<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AboutMeController extends AbstractController
{
    public function index(Request $reques)
    {
        return $this->render('aboutMe/index.html.twig');
    }
}
