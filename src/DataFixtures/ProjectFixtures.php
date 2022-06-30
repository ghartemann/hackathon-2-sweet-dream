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
        for ($i = 0; $i < 10; $i++) 
        {
        $project = new Project();
        $project->setTitle($faker->unique()->randomElement([
                'Super projet',
                'Webapp pour une association',
                'Projet d\'appli géolocalisée',
                'Un autre super projet',
                'Projet de webapp',
                'Projet secret',
                'Site e-commerce',
                'Projet génial',
                'Nouveau projet',
                'Appli de suivi médical'
                ]))
                ->setTopic($faker->randomElement(
                    ['Banque', 'Assurance', 'Médecine', 'Aéronautique', 'Energie']
                ))
                ->setAgency($faker->randomElement(
                    [
                        'Nantes', 'Lyon', 'Le Mans', 'Aveiro', 'Niort', 'Dijon', 'Montpellier', 'Clermont-Ferrand', 'Lille', 'Vernon', 'Rennes', 'Genève', 'Toulouse', 'Munich', 'Canada', 'Aix-en-Provence', 'Orléans', 'Brest', 'Bruxelles', 'Casablanca', 'Strasbourg', 'Nice - Sophia Antipolis', 'Bordeaux', 'Tours'
                    ]
                ))
                ->setTechno($faker->randomElement(
                    ['Javascript', 'Java', 'PHP']
                ))
                ->setDescription($faker->text(100))
            ;

        $manager->persist($project);

        }
        $manager->flush();
    }
}
