<?php

namespace App\Form\Type\FormAdmin;

use App\Entity\Category;
use App\Entity\Product;
use App\Form\ProperiesType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProductAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class)
            ->add('price',TextType::class)
            ->add('discription',TextType::class)
            ->add('numberOfProduct',TextType::class)
            ->add('category',EntityType::class,[
                'class' => Category::class,

                'choice_label' => 'name',
            ])
            ->add('imgProduct',FileType::class,[
                'data_class' => null,

                'label' => 'imgProduct',
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/jpg'
                        ]
                    ])

                ]
            ])

        ;
        $builder

            ->add('tags', CollectionType::class, [
                'entry_type' => ProperiesType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
