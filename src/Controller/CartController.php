<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\CartRepository;
use App\Service\CartActionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    private SessionInterface $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
        $this->session->start();
    }

    /**
     * @Route("shop/cart", name="cart")
     */
    public function cart(CartRepository $repository, Request $request): Response
    {
        $cartItem = $repository->findBy(["sessionId" => $request->getSession()->getId()]);

        return $this->render('cart/index.html.twig', [
            'cartItem' => $cartItem,
        ]);

//        return $this->redirect($request->headers->get('referer'));
    }

    /**
     * @Route("shop/cart/{nameAction}/{id}", name="cartAction")
     */
    public function getNameAction(Request $request, string $nameAction, int $id, CartActionService $actionService): Response
    {

        $actionService->action($id, $nameAction, $request->query->get('changeCount'));

        return $this->redirectToRoute('cart');
    }
}
