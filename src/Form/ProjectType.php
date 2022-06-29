<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('topic', TextType::class, ['label' => 'Sujet'])
            ->add('agency', TextType::class, ['label' => 'Agence'])
            ->add('techno', TextType::class, ['label' => 'Techno'])
            ->add('description', TextType::class, ['label' => 'Description'])
            ->add('meeting', TextType::class, ['label' => 'Réunion à venir'])
            //->add('users')
            //->add('interest')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
