<?php

namespace App\Controller;

use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/game/related/{id}', name: 'app_api_game_related')]
    public function index(Game $game): Response
    {
        $studio = $game->getStudio();

        $games = $studio->getGames();
        $gamesToReturn = [];

        foreach($games as $otherGame) {
            if($otherGame->getId() == $game->getId())
                continue;

            $gamesToReturn[] = [
                'title' => $otherGame->getTitle(),
                'cover'=> $otherGame->getCover()
            ];
        }

        return $this->json($gamesToReturn);
    }
}
