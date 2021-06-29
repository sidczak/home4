<?php

namespace App\Controller\Admin;

use App\Entity\Start;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin")
 */
class StartController extends AbstractController
{
    /**
     * @Route("/", name="admin_dashboard")
     */
    public function index(Request $reques)
    {
        return $this->render('admin/start/index.html.twig');
    }

}
