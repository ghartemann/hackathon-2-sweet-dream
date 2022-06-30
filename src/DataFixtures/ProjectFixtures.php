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
                'Wonderful project',
                'Webapp for an association',
                'Geolocation',
                'Great project',
                'Webapp project',
                'Secret project',
                'Ecommerce website',
                'PAwesome project',
                'New project',
                'Medical monitoring webapp',
            ]))
                ->setTopic($faker->randomElement(
                    ['Bank', 'Insurance', 'Medical', 'aeronautics', 'Energies']
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
                    ], rand(2, 5)
                ))
                ->setDescription($faker->text(100));

            $manager->persist($project);
        }
        $manager->flush();
    }
}
