<?php

namespace App\Form;

use App\Entity\BlogPost;
use App\Entity\BlogCategory;
use App\Entity\BlogTag;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class BlogPostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('title')
            // ->add('slug')
            // ->add('excerpt')
            // ->add('content')
            // ->add('authorEmail')
            // ->add('statusPost')
            // ->add('showComment')
            // ->add('enableComment')
            // ->add('viewsPost')
            // ->add('publishedAt')
            // ->add('updatedAt')
            // ->add('user')
            // ->add('category')
            // ->add('tags')

            ->add('title', TextType::class, [
                'empty_data' => '',
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 255]),
                ]
            ])
            // ->add('slug')
            ->add('excerpt', TextareaType::class, [
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('content', TextareaType::class, [
                'empty_data' => '',
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('authorEmail', EmailType::class, [
                'empty_data' => '',
                'constraints' => [
                    new NotBlank(),
                    new Email()
                ],
                'help' => 'Make sure to add a valid email',
            ])
            ->add('statusPost', ChoiceType::class, [
                'choices' => array(
                    'Publish' => 'publish', 
                    'Expect' => 'expect', 
                    'Draft' => 'draft',
                ),
                'expanded' => true,
                'constraints' => [
                    new NotBlank(),
                ]
            ])

            ->add('showComment')
            ->add('enableComment')
            // ->add('viewsPost')
            // ->add('publishedAt')
            // ->add('updatedAt')
            ->add('user')
            ->add('category', EntityType::class, [
                'class' => BlogCategory::class,
                'choice_label' => 'name',
                'expanded' => true,
                'constraints' => [
                    new NotBlank(),
                ]
            ])
            ->add('tags', EntityType::class, [
                'class' => BlogTag::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'constraints' => [
                    new NotBlank(),
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BlogPost::class,
        ]);
    }
}
