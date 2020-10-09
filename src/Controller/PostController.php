<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="homepage", methods={"GET"})
     */
    public function index(PostRepository $postRepository): Response
    {
        return $this->render('post/index.html.twig', [
            'posts' => $postRepository->findBy(
                array(),
                array('createAt' => 'ASC')
            ),
        ]);
    }


    /**
     * @Route("post/{id}", name="post_show", methods={"GET", "POST"})
     */
    public function show(Request $request, Post $post, CommentRepository $commentRepository): Response
    {
        $em = $this->getDoctrine()->getManager();
        $views = $post->getViews();
        $post->setViews($views + 1);
        $em->flush();

        $comment = new Comment();

        $form = $this->createForm(PostType::class, $comment, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comment = $form ->getData();
            $comment ->setCreateAt(new \DateTime('now'));
            $comment ->setPost($post);
            $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
            $user = $this->getUser();
            $comment ->setUser($user);


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
        }

        return $this->render('post/show.html.twig', [
            'post' => $post,
            'comment' => $comment,
            'form' => $form->createView(),
            'comments' => $commentRepository->findBy(
                array('post' => ['id'  => $post->getID()]),
                array('createAt' => 'ASC')
            ),
        ]);
    }

    /**
     * @Route("post/{id}/edit", name="post_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Post $post): Response
    {
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('post_index');
        }

        return $this->render('post/edit.html.twig', [
            'post' => $post,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("post/{id}", name="post_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Post $post): Response
    {
        if ($this->isCsrfTokenValid('delete'.$post->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($post);
            $entityManager->flush();
        }

        return $this->redirectToRoute('post_index');
    }
}
