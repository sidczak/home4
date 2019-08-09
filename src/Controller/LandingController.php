<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class LandingController extends AbstractController
{
    /**
     * @Route("/webinar-flywheel", name="webinar_flywheel")
     */
    public function webinarFlywheel(Request $reques)
    {
        return $this->render('landing/webinarFlywheel.html.twig');
    }
}