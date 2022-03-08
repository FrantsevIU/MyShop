<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\ItemProduct;
use App\Entity\Product;
use App\Repository\CartRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    private SessionInterface $session;

    /**
     * @param SessionInterface $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
        $this->session->start();
//        $this->session->set("flag",1);
    }

    /**
     * @Route("shop/cart", name="cart")
     */
    public function cart(CartRepository $repository,Request $request): Response
    {
        $cartItem = $repository->findBy(["sessionId" => $request->getSession()->getId()]);


        return $this->render('cart/index.html.twig', [
            'cartItem' => $cartItem,
        ]);
    }

    /**
     * @Route("shop/cart/dellItem/{id}", name="dellItem")
     */
    public function dellProduct(int $id, EntityManagerInterface $em)
    {
        $Item = $em->getRepository(Cart::class)->find($id);

        $em->remove($Item);
        $em->flush();

        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("shop/cart/clear", name="clear")
     */
    public function clearCart(EntityManagerInterface $em,Request $request)
    {
        $item = $em->getRepository(Cart::class)
            ->findBy(["sessionId" => $request->getSession()->getId()]);

        foreach ($item as $value) {
            $em->remove($value);
        }

        $em->flush();

        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("shop/cart/update/add/{id}", name="addUpdateCart")
     * @param EntityManagerInterface $em
     * @param int $id
     * @return Response
     */
    public function plusCount(EntityManagerInterface $em, int $id): Response
    {
        $itemCart = $em->getRepository(Cart::class)->find($id);
        $i = $itemCart->getCount();
        $itemCart->setCount(++$i);

        $em->flush();

        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("shop/cart/update/dell/{id}", name="dellUpdateCart")
     * @param int $id
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function minusCount(int $id, EntityManagerInterface $em): Response
    {
        $cart = $em->getRepository(Cart::class)->find($id);
        if ($cart->getCount() <= 1) {
            $em->remove($cart);
        } else {
            $cart->setCount($cart->getCount() - 1);
        }
        $em->flush();

        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/shop/cart/add/{id}", name="itemAddCart")
     * @param Request $request
     * @param int $id
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function addProduct(Request $request, int $id, EntityManagerInterface $em): Response
    {
        $cart = $em->getRepository(Cart::class)->findOneBy([
            'sessionId' => $request->getSession()->getId(),
            'product' => $id
        ]);
//        dump($request->getSession());
//        die(1);

        if ($cart) {
            $cart->setCount($cart->getCount() + 1);
        } else {
            $request->getSession()->set("flag",1);
            $product = $em->getRepository(Product::class)->findOneBy(['id' => $id]);

            $cart = new Cart();
            $cart->setProduct($product);
            $cart->setSessionid($request->getSession()->getId());
            $cart->setCount(1);

            $em->persist($cart);
        }

        $em->flush();

        return $this->redirect($request->headers->get('referer'));
    }


}
