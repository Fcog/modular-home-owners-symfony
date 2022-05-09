<?php

namespace App\DataFixtures;

use App\Entity\HomeStyle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class HomeStylesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i <= 10; $i++) {
            $style = new HomeStyle();
            $style->setName($faker->name());
            $manager->persist($style);
        }

        $manager->flush();
    }
}
