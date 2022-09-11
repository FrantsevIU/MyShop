<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="shopList")
     */
    public function allProduct(EntityManagerInterface $em): Response
    {
        $product = $em->getRepository(Product::class)->findAll();

        return $this->render('product/show.html.twig', [
            'item' => $product
        ]);
    }

    /**
     * @Route("/shop/item/{id}", name="itemShow")
     */
    public function product($id, EntityManagerInterface $em): Response
    {
        $product = $em->getRepository(Product::class)->find($id);
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        return $this->render('product/idproduct.html.twig', [
            "product" => $product
        ]);
    }
}
