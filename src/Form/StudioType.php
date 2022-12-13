<?php

namespace App\Form;

use App\Entity\Studio;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom',
                'attr' => ['class' => 'red', 'placeholder' => 'Saisir le nom du studio']
            ])
            ->add('nbOfEmployees', NumberType::class, [
                'label' => 'Nombre d\'employés',
                'attr' => ['placeholder' => 'Saisir le nombre d\'employé']
            ])
            ->add('city', ChoiceType::class, [
                'label' => 'Ville',
                'choices' => ['Lyon' => 'Lyon', 'Paris' => 'Paris', 'Nantes' => 'Nantes']
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Studio::class,
        ]);
    }
}
