<?php

namespace App\Form;

use App\Entity\BasicValidators;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class BasicValidatorsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'empty_data' => '',
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 255]),
                ]
            ])
            ->add('email', EmailType::class, [
                'empty_data' => '',
                'constraints' => [
                    new NotBlank([
                        'message' => "The email address is required and can't be empty"
                    ]),
                    new Email()
                ],
                'help' => 'Make sure to add a valid email',
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => array(
                    'Male' => 'M', 
                    'Female' => 'F'
                ),
                'expanded' => true,
                'multiple' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => "The gender is required and can't be empty"
                    ]),
                ]
            ])
            ->add('internetBrowsers', ChoiceType::class, [
                'choices' => array(
                    '-- Select a internet browsers --' => '',
                    'Internet Explorer' => 'ie',
                    'Firefox'           => 'firefox',
                    'Google Chrome'     => 'google_chrome',
                    'Opera'             => 'opera',
                    'Other'             => 'other'
                ),
                'expanded' => false,
                'multiple' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => "The internet browsers is required and can't be empty",
                    ]),
                ]
            ])
            ->add('operatingSystem', ChoiceType::class, [
                'choices' => array(
                    'dos'     => 'Dos',
                    'windows' => 'Windows',
                    'linux'   => 'Linux',
                    'other'   => 'Other'
                ),
                'expanded' => false,
                'multiple' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => "The operating system is required and can't be empty",
                    ]),
                    new Assert\Count([
                        'min' => 2,
                        'minMessage' => 'Please choose {{ limit }} operating system you know',
                    ]),
                ]
            ])
            ->add('languages', ChoiceType::class, [
                'choices' => array(
                    'English' => 'en',
                    'French'  => 'fr',
                    'German'  => 'de',
                    'Russian' => 'ru',
                    'Other'   => 'other'
                ),
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => "The languages is required and can't be empty",
                    ]),
                    new Assert\Count([
                        'min' => 2,
                        'max' => 4,
                        'minMessage' => 'Please choose 2 - 4 languages you are good at',
                        'maxMessage' => 'Please choose 2 - 4 languages you are good at',
                    ]),
                ]
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BasicValidators::class,
        ]);
    }
}
