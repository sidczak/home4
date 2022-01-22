<?php

namespace App\Form;

use App\Entity\BasicValidators;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
        $builder->add('firstName', TextType::class, [
            'empty_data' => '',
            'attr' => array(
                'class' => 'form-control',
                'placeholder' => 'First name'
            ),
            'constraints' => [
                new NotBlank([
                    'message' => "The first name is required and can't be empty"
                ]),
            ]
        ]);

        $builder->add('lastName', TextType::class, [
            'empty_data' => '',
            // 'attr' => array(
            //     'class' => 'form-control',
            //     'placeholder' => 'Last name'
            // ),
            'constraints' => [
                new NotBlank([
                    'message' => "The last name is required and can't be empty"
                ]),
            ]
        ]);

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
            ->add('website', UrlType::class, [
                'constraints' => [
                    new Length(['max' => 255]),
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password and its confirm password are not the same',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password'],
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
            ->add('age', IntegerType::class, [
                'attr' => [
                    'min'        => 18,
                    'max'        => 100,
                    // 'minMessage' => 'Please enter a value greater than or equal to {{ limit }}',
                    // 'maxMessage' => 'Please enter a value less than or equal to {{ limit }}',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => "The age is required and can't be empty"
                    ]),
                ],
            ])
            ->add('birthday', DateType::class, [
                'widget' => 'single_text',
                'required' => true,
                'empty_data' => null,
                'invalid_message' => 'The birthday is not valid',
                // "data" => new \DateTime(),
                // 'help' => 'The required date format (YYYY/MM/DD)',
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
            ->add('programmingLanguages', ChoiceType::class, [
                'choices' => array(
                    'net'        => '.Net',
                    'java'       => 'Java',
                    'c_c++'      => 'C/C++',
                    'php'        => 'PHP',
                    'perl'       => 'Perl',
                    'ruby'       => 'Ruby',
                    'python'     => 'Python',
                    'javascript' => 'Javascript'
                ),
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => "The programming languages is required and can't be empty",
                    ]),
                    new Assert\Count([
                        'min' => 2,
                        'max' => 4,
                        'minMessage' => 'Please choose 2 - 4 programming languages you are good at',
                        'maxMessage' => 'Please choose 2 - 4 programming languages you are good at',
                    ]),
                ]
            ])
            ->add('comment', TextareaType::class, [
                'attr' => array('rows' => '3'),
                'constraints' => [
                    new NotBlank([
                        'message' => "The comment is required and can't be empty",
                    ]),
                    new Assert\Length([
                        'min' => 10,
                        'max' => 100,
                        'minMessage' => 'The comment must have at least {{ limit }} characters long',
                        'maxMessage' => 'The comment must be less than {{ limit }} characters long',
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
