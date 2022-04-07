<?php

declare(strict_types=1);


namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\Type\OrderType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class OrderController extends AbstractController
{
    /**
     * @Route("shop/cart/order", name="orderCart")
     */
    public function orderTask(Request $request, EntityManagerInterface $em): Response
    {
        $orderTask = new Order();

        $form = $this->createForm(OrderType::class, $orderTask);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($orderTask);
            $em->flush();

            return $this->redirectToRoute('shopList');
        }
        return $this->renderForm('order/index.html.twig', [
            'form' => $form,
        ]);
    }
}
