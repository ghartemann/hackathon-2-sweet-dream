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
                    'Nantes',
                    'Lyon',
                    'Le Mans',
                    'Aveiro',
                    'Niort',
                    'Dijon',
                    'Montpellier',
                    'Clermont-Ferrand',
                    'Lille',
                    'Vernon',
                    'Rennes',
                    'Genève',
                    'Toulouse',
                    'Munich',
                    'Canada',
                    'Aix-en-Provence',
                    'Orléans',
                    'Brest',
                    'Bruxelles',
                    'Casalblanca',
                    'Strasbourg',
                    'Nice - Sophia Antipolis',
                    'Bordeaux',
                    'Tours',
                ]
            ));
            $user->setSkills($faker->sentence());
            $user->setPosition($faker->jobTitle());
            $user->setRoles((array)'ROLE_USER');
            $user->setParticipant($faker->boolean());
            $user->setOrganizer($faker->boolean());

            $manager->persist($user);
        }
        $manager->flush();
    }
}
