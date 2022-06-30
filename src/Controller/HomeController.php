<?php

namespace App\Controller;

use App\Entity\Interest;
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
        $interests = $interestRepository->findBy([
            'likeStatus' => null,
            'user' => $this->getUser(),
        ]);

        return $this->render('home/index.html.twig', [
            'interests' => $interests
        ]);
    }

    #[Route('/{id}/like/project', name: 'like_project')]
    public function likeProject(Interest $interest, InterestRepository $interestRepository): Response
    {
        $interest->setLikeStatus(true);
        $interestRepository->add($interest, true);
        return $this->redirectToRoute('app_home_index');
    }

    #[Route('/dislike/project', name: 'dislike_project')]
    public function dislikeProject(InterestRepository $interestRepository): Response
    {
        $interest = $interestRepository->findOneBy([]);
        $interest->setLikeStatus(false);
        return $this->redirectToRoute('app_home_index');
    }

    #[Route('/likes', name: 'likes')]
    public function showLikes(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();

        return $this->render('home/likes.html.twig', ['projects' => $projects]);
    }
}
