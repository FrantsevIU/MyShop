<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\PropertiesProducts;
use App\Entity\PropertyValue;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyValueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('productId',EntityType::class,[
                'class'=>Product::class,
                'choice_label'=>'name'
            ])
            ->add('propertyid',EntityType::class,[
                'class'=>PropertiesProducts::class,

                'choice_label'=>'name'

            ])

            ->add('value')
        ;

//  $builder ->add('propertyid', CollectionType::class, [
//      'entry_type' => PropertiesProducts::class,
//      'entry_options' => ['label' => false],
//        ]);




    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PropertyValue::class,
        ]);
    }
}
