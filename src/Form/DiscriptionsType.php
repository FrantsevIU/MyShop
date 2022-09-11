<?php

namespace App\Form;

use App\Entity\Discriptions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiscriptionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('disc_1',TextType::class,[
                'label' => 'описание 1'
            ])
            ->add('disc_2',TextType::class)
            ->add('disc_3',TextType::class)
            ->add('disc_5',TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Discriptions::class,
        ]);
    }
}
