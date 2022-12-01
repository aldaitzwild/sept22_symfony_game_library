<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Game;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class GameFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
      $superPhanPhan = new Game();
      $superPhanPhan->setTitle('Super PhanPhanShooter');
      $superPhanPhan->setDescription("Un un shoot'em up délirant un melange de super aleste et ikaruga.");
      $superPhanPhan->setYear(2022);
      $superPhanPhan->setStudio($this->getReference('studio_2'));
      $superPhanPhan->setCover('https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Webysther_20160423_-_Elephpant.svg/1280px-Webysther_20160423_-_Elephpant.svg.png');
      $manager->persist($superPhanPhan);

      $goldenEye = new Game();
      $goldenEye->setTitle('GoldenEye 007');
      $goldenEye->setDescription("GoldenEye 007 est un jeu vidéo de tir à la première personne, développé par Rare. Si tu veux réussir tes speed run sur facility regarde le plafond et compte les dalles");
      $goldenEye->setYear(1997);
      $goldenEye->setStudio($this->getReference('studio_' . rand(1,2)));
      $goldenEye->setCover('https://www.squarepalace.com/sites/default/files/anniversaires//6242.jpg');
      $manager->persist($goldenEye);

      $adibou = new Game();
      $adibou->setTitle('Adibou');
      $adibou->setDescription("Adibou est un jeu vidéo ludo-éducatif développé et édité par Coktel Vision. Si tu aimes les défis, les triples A il est fait pour toi.");
      $adibou->setYear(1992);
      $adibou->setStudio($this->getReference('studio_' . rand(1,2)));
      $adibou->setCover('https://pictures.abebooks.com/inventory/8508851639.jpg');
      $manager->persist($adibou);

      $manager->flush();
    }

    public function getDependencies() 
    {
      return [
        StudioFixtures::class
      ];
    }
}
