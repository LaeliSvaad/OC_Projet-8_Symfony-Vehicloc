<?php

namespace App\Form;

use App\Enum\MotorType;
use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom de la voiture',
                'attr' => [
                    'id' => 'name',
                    'name' => 'name',
                    'placeholder' => 'Entrez le nom de la voiture...',
                ],])
            ->add('description', TextareaType::class, ['label' => 'Description',
                'attr' => [
                    'id' => 'description',
                    'name' => 'description',
                    'placeholder' => 'Entrez la description de la voiture...',
                ],])
            ->add('monthly_price', NumberType::class, ['label' => 'Prix mensuel',
                'attr' => [
                    'id' => 'monthly_price',
                    'name' => 'monthly_price',
                ],])
            ->add('daily_price', NumberType::class, ['label' => 'Prix journalier',
                'attr' => [
                    'id' => 'daily_price',
                    'name' => 'daily_price',
                ],])
            ->add('places', ChoiceType::class, ['choices'  => [
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
             ],
                'label' => 'Nombre de places',
                'attr' => [
                    'id' => 'places',
                    'name' => 'places',
                ],])
            ->add('motor', EnumType::class, ['class' => MotorType::class, 'label' => 'Boîte de vitesse',
                'attr' => [
                    'id' => 'motor',
                    'name' => 'motor',
                ],])
            ->add('save', SubmitType::class, [
                'label' => 'Ajouter',
                'attr' => [
                    'class' => 'btn-add',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
