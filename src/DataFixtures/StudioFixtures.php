<?php

namespace App\DataFixtures;

use App\Entity\Studio;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class StudioFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $studios = [
            ['Square Enix', 'square_enix'],
            ['Ubisoft', 'ubisoft'],
            ['Blizzard', 'blizzard'],
            ['EA', 'ea'],
            ['Microsoft', 'microsoft'],
            ['Nintendo', 'nintendo'],
            ['Sony', 'sony'],
            ['Namco Bandai', 'namco_bandai'],
            ['Konami', 'konami'],
            ['Bethesda', 'bethesda'],
            ['Thomas et Ludo Company', 'tlc'],
        ];

        $faker = Factory::create();

        foreach($studios as $studioData) {
            $studio = new Studio();
            $studio->setName($studioData[0]);
            $studio->setNbOfEmployees($faker->numberBetween(20, 500));
            $this->addReference($studioData[1], $studio);
            $manager->persist($studio);
        }
        $manager->flush();
    }
}
