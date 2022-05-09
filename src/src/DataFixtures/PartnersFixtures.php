<?php

namespace App\DataFixtures;

use App\Entity\Partner;
use App\Entity\PartnerType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PartnersFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $partnerTypes = $manager->getRepository(PartnerType::class)->findAll();

        for ($i = 0; $i <= 30; $i++) {
            $partner = new Partner();
            $partner->setName($faker->name());
            $partner->setLogo($faker->fileExtension());
            $partner->setPhone($faker->phoneNumber());
            $partner->setWebsite($faker->url());
            $partner->setType($faker->randomElement($partnerTypes));
            $manager->persist($partner);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
          PartnerTypesFixtures::class,
        ];
    }
}
