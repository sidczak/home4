<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AboutMeController extends AbstractController
{
    /**
     * @Route("/about-me", name="about_me")
     */
    public function index()
    {
        //return $this->render('about_me/index.html.twig');
        return $this->render('about_me/index.html.twig', [
            'controller_name' => 'AboutMeController',
        ]);
    }

    /**
     * @Route("/about-me/ania", name="about_ania")
     */
    public function aboutAnia()
    {
        return $this->render('about_me/aboutAnia.html.twig');
    }

    /**
     * @Route("/about-me/szymon", name="about_szymon")
     */
    public function aboutSzymon()
    {
        return $this->render('about_me/aboutSzymon.html.twig');
    }
}
