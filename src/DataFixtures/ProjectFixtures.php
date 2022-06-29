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
        // $product = new Product();
        // $manager->persist($product);


        $faker = Factory::create('fr_FR');
        $project = new Project();
        $project->setTitle($faker->sentence(5));
        $project->setTopic($faker->sentence(10));
        $project->setAgency($faker->city());
        $project->setTechno($faker->randomElement(
            ['PHP', 'Javascript', 'API', 'React', 'Symfony',
            'Laravel', 'Flutter', 'C++']
        ));
        $project->setDescription($faker->paragraphs(3, true));
        $project->setMeeting($faker->sentence(1));

        $manager->flush();
    }
}
