<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class VuetifyController extends AbstractController
{
    /**
     * @Route("/vuetify", name="vuetify_start_index")
     */
    public function index(Request $reques)
    {
        return $this->render('vuetify/start/index.html.twig');
    }
}
