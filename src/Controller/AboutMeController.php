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
     * @Route("/about-me-vuetify", name="about_me_vuetify")
     */
    public function vuetify()
    {
        return $this->render('about_me/vuetify.html.twig');
    }
}
