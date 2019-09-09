<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/landing")
 */
class LandingController extends AbstractController
{
    /**
     * @Route("/homepage", name="landing_homepage")
     */
    public function homepage(Request $reques)
    {
        return $this->render('landing/homepage.html.twig');
    }
    /**
     * @Route("/webinar-flywheel", name="webinar_flywheel")
     */
    public function webinarFlywheel(Request $reques)
    {
        return $this->render('landing/webinarFlywheel.html.twig');
    }
}