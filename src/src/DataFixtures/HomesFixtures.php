<?php

namespace App\DataFixtures;

use App\Entity\Home;
use App\Entity\HomeStyle;
use App\Entity\Partner;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class HomesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $partners = $manager->getRepository(Partner::class)->findAll();
        $homeStyles = $manager->getRepository(HomeStyle::class)->findAll();

        for ($i = 0; $i <= 80; $i++) {
            $home = new Home();
            $home->setName($faker->name());
            $home->setBaths($faker->randomElement([1, 1.5, 2, 2.5, 3, 3.5, 4]));
            $home->setBedrooms($faker->numberBetween(1, 5));
            $home->setCode($faker->lexify());
            $home->setCost($faker->numberBetween(30000, 1000000));
            $home->setEstimatedCost($faker->numberBetween(30000, 1000000));
            $home->setInfo($faker->realTextBetween());
            $home->setLink($faker->url());
            $home->setFloorplansLink($faker->url());
            $home->setSqft($faker->numberBetween(70, 1000));
            $home->setStories($faker->numberBetween(1, 3));
            $home->setVerified($faker->boolean(80));
            $home->setHomeStyle($faker->randomElement($homeStyles));
            $home->setPartner($faker->randomElement($partners));
            $manager->persist($home);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PartnersFixtures::class,
            HomeStylesFixtures::class,
        ];
    }
}
