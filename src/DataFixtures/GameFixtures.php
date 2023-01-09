<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Studio;
use App\Entity\Game;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class GameFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $games = [
            ['square_enix', 'Chrono trigger', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co3plw.png'],
            ['square_enix', 'Final Fantasy VI', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co31c2.png'],
            ['square_enix', 'Dragon Quest', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1x9i.png'],

            ['ubisoft', 'Rayman', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1waa.png'],
            ['ubisoft', 'Splinter Cell', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co2ysy.png'],
            ['ubisoft', 'Assassin\'s Creed', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1rrw.png'],

            ['blizzard', 'World of Warcraft', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co2l7z.png'],
            ['blizzard', 'Warcraft 2', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co3wix.png'],
            ['blizzard', 'Starcraft', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1x7n.png'],

            ['ea', 'Fifa 13', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co206y.png'],
            ['ea', 'Fifa 14', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co206x.png'],
            ['ea', 'Fifa 15', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co206w.png'],

            ['microsoft', 'Halo', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co2r2r.png'],
            ['microsoft', 'Banjo-Tooie', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co4rfo.png'],
            ['microsoft', 'Viva Piñata', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co2h1y.png'],

            ['nintendo', 'Mario Kart 64', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1te8.png'],
            ['nintendo', 'Zelda 64', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co3nnx.png'],
            ['nintendo', 'Metroid', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1xe8.png'],

            ['sony', 'God Of War', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co3ddc.png'],
            ['sony', 'Gran Turismo', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1pd3.png'],
            ['sony', 'Uncharted', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1tp7.png'],

            ['namco_bandai', 'Pac-Man 99', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co2xr4.png'],
            ['namco_bandai', 'Tales of Phantasia', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co25yi.png'],
            ['namco_bandai', 'Time Crisis', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1y7l.png'],

            ['konami', 'Suikoden 2', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1y6a.png'],
            ['konami', 'Metal Gear', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co3ogc.png'],
            ['konami', 'Pro Evolution Soccer', 'https://images.igdb.com/igdb/image/upload/t_cover_big/co3wgb.png'],

            ['tlc', 'Super Phanphan Shooter', 'https://via.placeholder.com/300'],
            ['tlc', 'Chess of Code 6', 'https://via.placeholder.com/300'],
        ];

        $faker = Factory::create();

        foreach ($games as $gameData) {
            $game = new Game();
            $game->setTitle($gameData[1]);
            $game->setDescription($faker->text(150));
            $game->setYear($faker->year());
            $game->setCover($gameData[2]);
            $game->setStudio($this->getReference($gameData[0]));

            $manager->persist($game); 
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
            return [
                StudioFixtures::class,
            ];
    }
}
