<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    #[Route('/card', name: 'app_card')]
    public function index(): Response
    {
        $project = new ;
        return $this->render('card/index.html.twig', [
            'project' => $project,
        ]);
    }
}
