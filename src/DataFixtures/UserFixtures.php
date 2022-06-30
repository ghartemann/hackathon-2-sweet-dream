<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $user = new User();

            $user->setFirstname($faker->firstName());
            $user->setLastName($faker->lastName());
            $user->setPhone($faker->phoneNumber());
            $user->setEmail($faker->email());
            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                'password'
            );
            $user->setPassword($hashedPassword);
            $user->setAgency($faker->randomElement(
                [
                    'Nantes, France',
                    'Lyon, France',
                    'Le Mans, France',
                    'Aveiro, Portugal',
                    'Niort, France',
                    'Dijon, France',
                    'Montpellier, France',
                    'Clermont-Ferrand, France',
                    'Lille, France',
                    'Vernon, France',
                    'Rennes, France',
                    'Geneva, Switzerland',
                    'Toulouse, France',
                    'Munich, Germany',
                    'Montréal, Canada',
                    'Aix-en-Provence, France',
                    'Orléans, France',
                    'Brest, France',
                    'Bruxelles, Belgium',
                    'Casalblanca, Morocco',
                    'Strasbourg, France',
                    'Nice - Sophia Antipolis, France',
                    'Bordeaux, France',
                    'Tours, France',
                ]
            ));
            $user->setSkills($faker->sentence());
            $user->setPosition($faker->jobTitle());
            $user->setRoles((array)'ROLE_USER');
            $user->setParticipant($faker->boolean());
            $user->setOrganizer($faker->boolean());

            $this->addReference('user_' . $i, $user);

            $manager->persist($user);
        }
        $manager->flush();
    }
}
