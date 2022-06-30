<?php

namespace App\Controller;

use App\Entity\Interest;
use App\Repository\InterestRepository;
use App\Repository\ProjectRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
            'interests' => $interests,
        ]);
    }

    #[Route('/{id}/like/project', name: 'like_project')]
    public function likeProject(Interest $interest, InterestRepository $interestRepository): Response
    {
        $interest->setLikeStatus(true);
        $interestRepository->add($interest, true);
        return $this->redirectToRoute('app_home_index');
    }

    #[Route('/{id}/dislike/project', name: 'dislike_project')]
    public function dislikeProject(Interest $interest, InterestRepository $interestRepository): Response
    {
        $interest->setLikeStatus(false);
        $interestRepository->add($interest, true);
        return $this->redirectToRoute('app_home_index');
    }

    #[Route('/{id}/dislike/from-like', name: 'dislike_project_from_like')]
    public function dislikeProjectFromLike(Interest $interest, InterestRepository $interestRepository): Response
    {
        $interest->setLikeStatus(null);
        $interestRepository->add($interest, true);
        return $this->redirectToRoute("app_home_likes");
    }

    #[Route('/likes', name: 'likes')]
    public function showLikes(InterestRepository $interestRepository): Response
    {
        $user = $this->getUser();
        $userId = $user->getId();

        $projects = $interestRepository->findUserInterests($userId);
//        $projects = $interestRepository->findBy(['user' => $userId,]);

        return $this->render('home/likes.html.twig', ['projects' => $projects]);
    }

    #[Route('/{id}/like/project-ajax', name: 'like_project_ajax', methods: ['POST'])]
    public function likeProjectAjax(Interest $interest, InterestRepository $interestRepository, Request $request, LoggerInterface $logger): Response
    {
        $like = $request->getContent() === 'true';
        $interest->setLikeStatus($like);
        $interestRepository->add($interest, true);
        return new JsonResponse();
    }


}
