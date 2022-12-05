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
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $game = new Game();
            $game->setTitle($faker->sentence(3));
            $game->setDescription($faker->text(150));
            $game->setYear($faker->year());
            $game->setCover('https://via.placeholder.com/300');
            $reference = $faker->numberBetween(0, 4);
            $studio = $this->getReference('studio_' . $reference);
            if ($studio instanceof Studio) {
                $game->setStudio($studio);
            }
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
