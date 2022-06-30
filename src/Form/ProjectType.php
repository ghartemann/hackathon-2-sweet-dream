<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('topic', TextType::class, ['label' => 'Sujet'])
            ->add('agency', TextType::class, ['label' => 'Agence'])
            ->add('techno', ChoiceType::class, array(
                    'choices' => 
                    array
                    (
                            'Javascript' => 'Javascript',
                            'Java' => 'Java',
                            'PHP' => 'PHP',
                            'Vue.js' => 'Vue.js',
                            'C#' => 'C#',
                            'C++' => 'C++',
                            'MySQL' => 'MySQL',
                            'NextJS' => 'NextJS',
                            'HTML' => 'HTML',
                            'SCSS' => 'SCSS'
                    ),
                    'multiple' => true,
                    'expanded' => true,
                    'required' => true
            ))
            ->add('description', TextType::class, ['label' => 'Description'])
            ->add('meeting', TextType::class, ['label' => 'Réunion à venir'])
            //->add('interests')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
