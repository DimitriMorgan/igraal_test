<?php

namespace AppBundle\Form\Type;

use Domain\Dto\User\RegisterDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('email', TextType::class)
            ->add('password', TextType::class)
            ->add('profileUrl', TextType::class)
            ->add('lastLogin', DateTimeType::class)
            ->add('creationDate', DateTimeType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RegisterDto::class,
            'csrf_protection' => false,
        ]);
    }
}