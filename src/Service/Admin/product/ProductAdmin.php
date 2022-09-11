<?php

namespace App\Service\Admin\product;

use App\Entity\Product;
use App\Form\Type\FormAdmin\ProductAdminType;
use Doctrine\ORM\EntityManagerInterface;

class ProductAdmin
{


    public function addProduct(EntityManagerInterface $em)
    {

    }

    public function dellProduct(EntityManagerInterface $em,int $id)
    {
        $product = $em->getRepository(Product::class)->findOneBy(['id'=>$id]);
        $em->remove($product);
        $em->flush();
    }

    public function updateProduct()
    {

    }

    public function hiddenProduct()
    {

    }



}
