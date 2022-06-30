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
        for ($i = 0; $i < 30; $i++) {
            $project = new Project();
            $project->setTitle($faker->randomElement([
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
                'Amazing project',
            ]))
                ->setTopic($faker->randomElement(
                    ['Banking', 'Insurance', 'Medicine', 'Aeronautics', 'Energy']
                ))
                ->setAgency($faker->randomElement(
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
            $this->addReference('project_' . $i, $project);


            $manager->persist($project);
        }
        $manager->flush();
    }
}
