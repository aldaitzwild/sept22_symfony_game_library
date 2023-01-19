<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameType;
use App\Repository\GameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class GameController extends AbstractController
{
    #[Route('/game', name: 'app_game')]
    #[Route('/', name: 'app_home_game')]
    public function index(GameRepository $gameRepository): Response
    {
        $games = $gameRepository->allGamesWithStudios();

        return $this->render('game/index.html.twig', [
            'games' => $games,
        ]);
    }

    #[Route('/game/add', name: 'app_game_add')]
    public function add(Request $request, GameRepository $gameRepository): Response
    {
        $game = new Game();
        $form = $this->createForm(GameType::class, $game);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $gameRepository->save($game, true);

            return $this->redirectToRoute('app_game');
        }
        
        return $this->renderForm('game/add.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/game/{id}', name: 'app_game_show')]
    public function show(Game $game, HttpClientInterface $client): Response
    {
        $response = $client->request('GET', 'https://api.rawg.io/api/games?key=535c56f922784eb4af6824cba791ac27&search=' . $game->getTitle());

        $content = $response->toArray();

        $screenshots = $content['results'][0]['short_screenshots'];

        return $this->render('game/show.html.twig', [
            'game' => $game,
            'screenshots' => $screenshots
        ]);
    }
}
