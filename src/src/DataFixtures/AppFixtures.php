<?php

namespace App\DataFixtures;

use App\Entity\Home;
use App\Entity\HomeStyle;
use App\Entity\Partner;
use App\Entity\PartnerType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    }
}
