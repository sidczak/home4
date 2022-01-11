<?php

namespace App\Controller;

use App\Entity\BasicValidators;
use App\Form\BasicValidatorsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bootstrap", defaults={"_project": "bootstrap"})
 */
class BootstrapController extends AbstractController
{
    /**
     * @Route("/", name="bootstrap_start_index")
     */
    public function index()
    {
        return $this->render('bootstrap/start/index.html.twig');
    }
    
    /**
     * @Route("/examples/album", name="examples_album")
     */
    public function album()
    {
        return $this->render('bootstrap/examples/album.html.twig');
    }

    /**
     * @Route("/examples/pricing", name="examples_pricing")
     */
    public function pricing()
    {
        return $this->render('bootstrap/examples/pricing.html.twig');
    }

    /**
     * @Route("/components/carousel", name="components_carousel")
     */
    public function carousel()
    {
        return $this->render('bootstrap/components/carousel.html.twig');
    }
    
    /**
     * @Route("/components/buttons", name="components_buttons")
     */
    public function buttons()
    {
        return $this->render('bootstrap/components/buttons.html.twig');
    }

    /**
     * @Route("/components/section", name="components_section")
     */
    public function section()
    {
        return $this->render('bootstrap/components/section.html.twig');
    }

    /**
     * @Route("/components/shadow", name="components_shadow")
     */
    public function shadow()
    {
        return $this->render('bootstrap/components/shadow.html.twig');
    }

    /**
     * @Route("/components/basic-forms", name="components_forms_basic")
     */
    public function formsBasic()
    {
        return $this->render('bootstrap/components/forms_basic.html.twig');
    }

    /**
     * @Route("/components/custom-forms", name="components_forms_custom")
     */
    public function formsCustom()
    {
        return $this->render('bootstrap/components/forms_custom.html.twig');
    }

    /**
     * @Route("/components/custom-forms-validation", name="components_forms_custom_validation")
     */
    public function formsCustomValidation(Request $request): Response
    {

        $basicValidators = new BasicValidators();
        $form = $this->createForm(BasicValidatorsType::class, $basicValidators);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            return $this->redirectToRoute('components_forms_custom_validation');
        }

        return $this->render('bootstrap/components/forms_custom_validation.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/components/custom-forms-validation-horizontal", name="components_forms_custom_validation_horizontal")
     */
    public function formsCustomValidationHorizontal(Request $request): Response
    {

        $basicValidators = new BasicValidators();
        $form = $this->createForm(BasicValidatorsType::class, $basicValidators);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            return $this->redirectToRoute('components_forms_custom_validation_horizontal');
        }

        return $this->render('bootstrap/components/forms_custom_validation_horizontal.html.twig', [
            'form' => $form->createView(),
        ]);


    }
    
}
