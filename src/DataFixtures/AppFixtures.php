<?php

namespace App\DataFixtures;

use App\Factory\CarFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //$product = new Product();
        //$manager->persist($product);
        CarFactory::createMany(10);
        $manager->flush();
    }
}
