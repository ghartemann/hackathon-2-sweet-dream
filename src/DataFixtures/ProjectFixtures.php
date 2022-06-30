<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->setTitle($faker->unique()->randomElement([
                'Awesome project',
                'Webapp for a charity',
                'Another awesome project',
                'Webapp project',
                'Please join this project',
                'Secret project',
                'e-shopping website',
                'Rad project',
                'New project',
                'Medical monitoring app',
            ]))
                ->setTopic($faker->randomElement(
                    ['Banking', 'Insurance', 'Medicine', 'Aeronautics', 'Energy']
                ))
                ->setAgency($faker->randomElement(
                    [
                        'Nantes', 'Lyon', 'Le Mans', 'Aveiro', 'Niort', 'Dijon', 'Montpellier', 'Clermont-Ferrand', 'Lille', 'Vernon', 'Rennes', 'Genève', 'Toulouse', 'Munich', 'Canada', 'Aix-en-Provence', 'Orléans', 'Brest', 'Bruxelles', 'Casablanca', 'Strasbourg', 'Nice - Sophia Antipolis', 'Bordeaux', 'Tours'
                    ]
                ))
                ->setTechno($faker->randomElements(
                    [
                        'Javascript',
                        'Java',
                        'PHP',
                        'Vue.js',
                        'React',
                        'C#',
                        'C++',
                        'MySQL',
                        'NextJS',
                        'HTML',
                        'SCSS',
                    ],
                    rand(2, 5)
                ))
                ->setDescription($faker->text(100))
                ->setPicture($faker->randomElement([
                    'build/images/project.jpg',
                    'build/images/project2.jpg',
                    'build/images/project3.jpg',
                    'build/images/project4.jpg',
                ]));

            $manager->persist($project);
        }
        $manager->flush();
    }
}
