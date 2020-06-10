<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/contact")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/{page}", name="admin_contact_index", methods={"GET"}, defaults={"page": 1}, requirements={"page" = "\d+"})
     */
    public function index(int $page): Response
    {
        $contacts = $this->getDoctrine()
            ->getRepository(Contact::class)
            ->findAll();

        $total_contacts = count($contacts);
        $contacts_per_page = 10;
        $last_page = ceil($total_contacts / $contacts_per_page);
        $previous_page = $page > 1 ? $page - 1 : 1;
        $next_page = $page < $last_page ? $page + 1 : $last_page;
        
        $repository = $this->getDoctrine()
            ->getRepository(Contact::class);

        $query = $repository->createQueryBuilder('c')
            ->setFirstResult(($page - 1) * $contacts_per_page)
            ->setMaxResults($contacts_per_page)
            ->getQuery();

        $contacts = $query->getResult();

        return $this->render('admin/contact/index.html.twig', [
            'contacts' => $contacts,
            'last_page' => $last_page,
            'previous_page' => $previous_page,
            'current_page' => $page,
            'next_page' => $next_page,
            'total_contacts' => $total_contacts,
        ]);
    }

    /**
     * @Route("/{id}/show", name="admin_contact_show", methods={"GET"})
     */
    public function show(Contact $contact): Response
    {
        return $this->render('admin/contact/show.html.twig', [
            'contact' => $contact,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_contact_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contact $contact): Response
    {
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_contact_index');
        }

        return $this->render('admin/contact/edit.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_contact_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Contact $contact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_contact_index');
    }
}
