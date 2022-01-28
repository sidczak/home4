<?php

namespace App\Controller\Admin;

use App\Entity\BlogPost;
use App\Entity\BlogImage;
use App\Form\BlogPostType;
use App\Repository\BlogPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("admin/blog/post")
 */
class BlogPostController extends AbstractController
{
    /**
     * @Route("/{page}", name="admin_blog_post_index", methods={"GET"}, defaults={"page": 1}, requirements={"page" = "\d+"})
     */
    public function index(
        BlogPostRepository $blogPostRepository, 
        PaginatorInterface $paginator, int $page): Response
    {
        
        $blogPosts = $paginator->paginate(
            $blogPostRepository->findAll(),
            $page,
            $this->getParameter('max_blog_posts_on_page')
        );
        return $this->render('admin/blog/post/index.html.twig', [
            'blog_posts' => $blogPosts,
        ]);
    }

    /**
     * @Route("/new", name="admin_blog_post_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $blogPost = new BlogPost();
        $form = $this->createForm(BlogPostType::class, $blogPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();

            $imageFiles = $form->get('images')->getData();
            if ($imageFiles) {

                foreach ($imageFiles as $file) 
                {
                    $fileName = \bin2hex(\random_bytes(10)) . '.' . $file->guessExtension();

                    $file->move(
                        $this->getParameter('project_dir') . '/public/images/blog/',
                        $fileName
                    );

                    $blogImage = new BlogImage();
                    $blogImage->setImage($fileName);
                    $blogImage->setPost($blogPost);
                    $entityManager->persist($blogImage);
                }
                // $fileName = \bin2hex(\random_bytes(10)) . '.' . $imageFile->guessExtension();
                // // moves the file to the directory where brochures are stored
                // $imageFile->move(
                //     $this->getParameter('project_dir') . '/public/images/blog/',
                //     $fileName
                // );

                // $blogImage = new BlogImage();
                // $blogImage->setImage($fileName);
                // $blogImage->setPost($blogPost);
                // $entityManager->persist($blogImage);
            }

            $entityManager->persist($blogPost);
            $entityManager->flush();

            return $this->redirectToRoute('admin_blog_post_index');
        }

        return $this->render('admin/blog/post/new.html.twig', [
            'blog_post' => $blogPost,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/show", name="admin_blog_post_show", methods={"GET"})
     */
    public function show(BlogPost $blogPost): Response
    {
        return $this->render('admin/blog/post/show.html.twig', [
            'blog_post' => $blogPost,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_blog_post_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BlogPost $blogPost): Response
    {
        $form = $this->createForm(BlogPostType::class, $blogPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();

             /** @var UploadedFile|null $imageFile */
            $imageFiles = $form->get('images')->getData();
            if ($imageFiles) {

                foreach ($imageFiles as $file) 
                {
                    $fileName = \bin2hex(\random_bytes(10)) . '.' . $file->guessExtension();

                    $file->move(
                        $this->getParameter('project_dir') . '/public/images/blog/',
                        $fileName
                    );

                    $blogImage = new BlogImage();
                    $blogImage->setImage($fileName);
                    $blogImage->setPost($blogPost);
                    $entityManager->persist($blogImage);
                }

                // $fileName = \bin2hex(\random_bytes(10)) . '.' . $imageFile->guessExtension();
                // // moves the file to the directory where brochures are stored
                // $imageFile->move(
                //     $this->getParameter('project_dir') . '/public/images/blog/',
                //     $fileName
                // );

                // $blogImage = new BlogImage();
                // $blogImage->setImage($fileName);
                // $blogImage->setPost($blogPost);
                // $entityManager->persist($blogImage);
            }

            $entityManager->flush();

            return $this->redirectToRoute('admin_blog_post_index');
        }

        return $this->render('admin/blog/post/edit.html.twig', [
            'blog_post' => $blogPost,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_blog_post_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BlogPost $blogPost): Response
    {
        if ($this->isCsrfTokenValid('delete'.$blogPost->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($blogPost);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_blog_post_index');
    }

    /**
     * @Route("/{id}/remove", name="admin_blog_post_remove")
     */
    public function remove(Request $request, BlogPost $blogPost): Response
    {
        if (!$blogPost->getId()) {
            throw $this->createNotFoundException('The post does not exist');
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($blogPost);
        $entityManager->flush();
        
        return $this->redirectToRoute('admin_blog_post_index');
    }


    /**
     * @Route("/{id}/showcomment", name="admin_blog_post_showcomment")
     */
    public function showComment(Request $request, BlogPost $blogPost): Response
    {
        if (!$blogPost->getId()) {
            throw $this->createNotFoundException('The post does not exist');
        }
        
        $blogPost->getShowComment() ? $blogPost->setShowComment(false) : $blogPost->setShowComment(true);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($blogPost);
        $entityManager->flush();
        
        return $this->redirectToRoute('admin_blog_post_index');
    }

    /**
     * @Route("/{id}/enablecomment", name="admin_blog_post_enablecomment")
     */
    public function enableComment(Request $request, BlogPost $blogPost): Response
    {
        if (!$blogPost->getId()) {
            throw $this->createNotFoundException('The post does not exist');
        }
        
        $blogPost->getEnableComment() ? $blogPost->setEnableComment(false) : $blogPost->setEnableComment(true);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($blogPost);
        $entityManager->flush();
        
        return $this->redirectToRoute('admin_blog_post_index');
    }

    /**
     * @Route("/{id}/{img}/remove-image", name="admin_blog_post_remove_image", methods={"GET"})
     * src/Controller/Admin/BlogImageController.php <- ta metoda do przenisienia
     */
    public function removeImage(int $id, int $img): Response
    {
        $image = $this->getDoctrine()
            ->getRepository(BlogImage::class)
            ->find($img);

        if (!$image) {
            throw $this->createNotFoundException('The image does not exist');
        }

        $file = $this->getParameter('project_dir') . '/public/images/blog/' . $image->getImage();

        if (file_exists($file)) {
            unlink($file);
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($image);
        $entityManager->flush();
        
        return $this->redirect($this->generateUrl('admin_blog_post_edit', ['id' => $id]));
    }
}
