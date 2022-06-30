<?php

namespace App\Controller;

use App\Repository\InterestRepository;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(name: 'app_home_')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProjectRepository $projectRepository, InterestRepository $interestRepository): Response
    {
        $interest = $interestRepository->findOneBy([
            'likeStatus' => null,
            'user' => $this->getUser(),
        ]);

        return $this->render('home/index.html.twig', [
            'interest' => $interest
        ]);
    }

    #[Route('/likes', name: 'likes')]
    public function showLikes(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();

        return $this->render('home/likes.html.twig', ['projects' => $projects]);
    }
}
