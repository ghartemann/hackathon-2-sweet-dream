<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('FR_fr');

        for ($i = 0; $i < 50; $i++) 
        {
        $user = new User();

        $user->setFirstname($faker->firstName());
        $user->setLastName($faker->lastName());
        $user->setPhone($faker->phoneNumber());
        $user->setEmail($faker->email());
        $user->setPassword($faker->password());
        $user->setAgency($faker->randomElement(
            [
                'Nantes', 'Lyon', 'Le Mans', 'Aveiro', 'Niort', 'Dijon', 'Montpellier', 'Clermont-Ferrand', 'Lille', 'Vernon', 'Rennes', 'Genève', 'Toulouse', 'Munich', 'Canada', 'Aix-en-Provence', 'Orléans', 'Brest', 'Bruxelles', 'Casablanca', 'Strasbourg', 'Nice - Sophia Antipolis', 'Bordeaux', 'Tours'
            ]));
        $user->setSkills($faker->sentence());
        $user->setPosition($faker->jobTitle());

        $user->setParticipant($faker->boolean());
        $user->setOrganizer($faker->boolean());

        $manager->persist($user);

        }
        $manager->flush();
    }
}
