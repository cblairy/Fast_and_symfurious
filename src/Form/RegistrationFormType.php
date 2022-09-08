<?php

namespace App\Form;

use App\Entity\Pilot;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'attr' => [
                    'placeholder' => 'Dominic Toretto'
                ],
            ])

            
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password',
                    'placeholder' => 'Password'
            ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])


            ->add('nationality', TextType::class, [
                'attr' => [
                    'placeholder' => 'American'
                ],
            ])
            

            ->add('drivingSkills', RangeType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 50
                ],
            ])


            ->add('photogenicSkills', RangeType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 50
                ],
            ])


            ->add('avatar', FileType::class, [
                'attr' => [
                    'required' => 'false',
                    'placeholder' => 'coucou'
                ],
            ])


            ->add('wallet', NumberType::class, [
                'attr' => [
                    'placeholder' => '10 000$ or more...'
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pilot::class,
        ]);
    }
}
