<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType; // Ajout de l'import pour SubmitType
use Symfony\Component\Validator\Constraints as Assert;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '5',
                    'maxlength' => '50'
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'Form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 5, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('firts_name', TextType::class, [ 
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '5',
                    'maxlength' => '50'
                ],
                'label' => 'Prenom',
                'label_attr' => [
                    'class' => 'Form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 5, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('email_adress' , TextType::class, [ 
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '5',
                    'maxlength' => '255'
                ],
                'label' => 'Email1',
                'label_attr' => [
                    'class' => 'Form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 5, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])

            ->add('Username' , TextType::class, [ 
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '5',
                    'maxlength' => '255'
                ],
                'label' => 'Username',
                'label_attr' => [
                    'class' => 'Form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 5, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('password' , TextType::class, [ 
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '10',
                    'maxlength' => '30'
                ],
                'label' => 'Password',
                'label_attr' => [
                    'class' => 'Form-label mt-4'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 10, 'max' => 30]),
                    new Assert\NotBlank()
                ]
            ])
            // Ajoutez d'autres champs ici si nécessaire
            ->add('submit', SubmitType::class, [ // Ajout du champ pour le bouton de soumission
                'attr' => [
                    'class' => 'btn btn-primary'       
                ],
                'label' => 'Créer mon Utilisateur'  
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}