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
        $faker = Factory::create();

        $toto = new Studio();
        $toto->setName('toto');
        $toto->setNbOfEmployees(50);
        $this->addReference('studio_0', $toto);
        $manager->persist($toto);

        for ($i = 1; $i < 5; $i++) {
            $studio = new studio();
            $studio->setName($faker->company());
            $studio->setNbOfEmployees($faker->numberBetween(3, 100));
            $this->addReference('studio_' . $i, $studio);
            $manager->persist($studio);
        }
            $manager->flush();
    }
}
