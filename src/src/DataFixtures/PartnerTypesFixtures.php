<?php

namespace App\DataFixtures;

use App\Entity\PartnerType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PartnerTypesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i <= 5; $i++) {
            $partnerType = new PartnerType();
            $partnerType->setName($faker->name());
            $manager->persist($partnerType);
        }

        $manager->flush();
    }
}
