<?php

namespace App\DataFixtures;

use App\Entity\Studio;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StudioFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $ubisoft = new Studio();
        $ubisoft->setName('Ubisoft');
        $ubisoft->setNbOfEmployees(3);
        $manager->persist($ubisoft);

        $totoCorp = new Studio();
        $totoCorp->setName('Toto Corporation international');
        $totoCorp->setNbOfEmployees(2500);
        $manager->persist($totoCorp);

        $manager->flush();


        $this->addReference("studio_1", $ubisoft);
        $this->addReference("studio_2", $totoCorp);
    }
}
