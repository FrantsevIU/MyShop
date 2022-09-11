<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\PropertiesProducts;
use Doctrine\DBAL\Types\IntegerType;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function __construct(EntityManagerInterface $em)
    {

        $this->em = $em;

    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $choices = $this->em->getRepository(PropertiesProducts::class)->findAll();
        $listChoces = [];
        foreach ($choices as  $value ) {
            $listChoces[$value->getName()] = $value->getid();
        }

        $choicesCategory = $this->em->getRepository(Category::class)->findAll();
        $listChocesCategory = [];
        foreach ($choicesCategory as  $value ) {
            $listChocesCategory[$value->getName()] = $value->getid();
        }

        $builder
            ->add('name', TextType::class, [
                'required' => false,
                'label' => 'Добавить  категорию ',])

            ->add('parrentId', ChoiceType::class, [
                'choices' => $listChocesCategory,

            ])
            ->add('propertiesId', ChoiceType::class, [
                'choices' => $listChoces,
                'expanded'=>true,
                'multiple'=> true,


            ]);
        $builder->get('propertiesId')
            ->addModelTransformer(new CallbackTransformer(
                function ($tagsAsArray) {
                    // преобразовать массив в строку
                    return explode(', ', $tagsAsArray);
                },
                function ($tagsAsString) {
                    // преобразовать строку обратно в массив
                    return implode(', ', $tagsAsString);
                }
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
