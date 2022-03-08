<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\ItemProduct;
use App\Entity\Order;
use App\Repository\CartRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\Type\OrderType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Security;

class OrderController extends AbstractController
{
    private SessionInterface $session;

    /**
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @Route("shop/cart/order", name="orderCart")
     */
    public function orderTask(Request $request, EntityManagerInterface $em): Response
    {
        $orderTask = new Order();

        $form = $this->createForm(OrderType::class, $orderTask);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Cart[] $itemCart */

            $em->persist($orderTask);
            $em->flush();

            return $this->redirectToRoute('shopList');
        }

        return $this->renderForm('order/index.html.twig', [
            'form' => $form,
        ]);
    }
}
