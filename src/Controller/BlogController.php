<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/', name: 'app_blog_index')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig');
    }

    #[Route('/example', name: 'app_blog_example')]
    public function example(): Response
    {
        $name = 'Axel';

        return $this->render('blog/example.html.twig', [
            'username' => $name,
        ]);
    }

    #[Route('/posts', name: 'app_blog_posts')]
    public function posts(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();
        $name = 'Axel';

        return $this->render('blog/posts.html.twig', [
            'username' => $name,
            'posts' => $posts,
        ]);
    }
}
