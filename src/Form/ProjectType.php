<?php

namespace App\Form;

use App\Entity\Project;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            ->add('title', TextType::class, ['label' => 'Title'])
            ->add('topic', TextType::class, ['label' => 'Field'])
            ->add('agency', TextType::class, ['label' => 'Office'])
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
                        'SCSS' => 'SCSS',
                    ),
                'multiple' => true,
                'expanded' => true,
                'required' => true,
            ))
            ->add('description', TextareaType::class, ['label' => 'Description'])
            ->add('meeting', TextType::class, ['label' => 'Meeting date', 'required' => false,
                'attr' => array(
                    'placeholder' => 'Leave empty if date is TBD',
                )]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
