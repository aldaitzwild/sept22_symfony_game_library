<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Game;

class GameFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $game = new Game();
        $game->setTitle('Super PhanPhanShooter');
        $game->setDescription("Un un shoot'em up délirant un melange de super aleste et ikaruga.");
        $game->setYear(2022);
        $game->setCover('https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Webysther_20160423_-_Elephpant.svg/1280px-Webysther_20160423_-_Elephpant.svg.png');
        $manager->persist($game);

         $game = new Game();
         $game->setTitle('GoldenEye 007');
         $game->setDescription("GoldenEye 007 est un jeu vidéo de tir à la première personne, développé par Rare. Si tu veux réussir tes speed run sur facility regarde le plafond et compte les dalles");
         $game->setYear(1997);
         $game->setCover('https://www.squarepalace.com/sites/default/files/anniversaires//6242.jpg');
        $manager->persist($game);

          $game = new Game();
          $game->setTitle('Adibou');
          $game->setDescription("Adibou est un jeu vidéo ludo-éducatif développé et édité par Coktel Vision. Si tu aimes les défis, les triples A il est fait pour toi.");
          $game->setYear(1992);
          $game->setCover('https://pictures.abebooks.com/inventory/8508851639.jpg');
        $manager->persist($game);

        $manager->flush();
    }
}
