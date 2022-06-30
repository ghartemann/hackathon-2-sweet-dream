<?php

namespace App\DataFixtures;

use App\Entity\Interest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class InterestFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        $faker = Factory::create();


        for ($p = 0; $p < 10; $p++) {
            for ($u = 0; $u < 50; $u++) {
                $interest = new Interest();
                $interest->setProject($this->getReference('project_' . $p));
                $interest->setUser($this->getReference('user_' . $u));
                $interest->setLikeStatus($faker->optional()->boolean(2));

                $manager->persist($interest);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            ProjectFixtures::class,
            UserFixtures::class,
        ];
    }
}
