<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homePage")
     */
    public function homePage(EntityManagerInterface $em)
    {
        $product = $em->getRepository(Product::class)->findAll();

        return $this->render('home/home.html.twig', [
            "product" => $product,
        ]);
    }
}
