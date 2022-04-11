<?php

declare(strict_types=1);

namespace App\Service\Cart;

use App\Entity\Cart;
use App\Entity\Product;
use App\Service\Impl\CartServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartAddProductService implements CartServiceInterface
{
    private EntityManagerInterface $em;
    private SessionInterface $session;

    public function __construct(EntityManagerInterface $em, SessionInterface $session)
    {
        $this->em = $em;
        $this->session = $session;
    }

    public function isAction(string $nameAction): bool
    {
        return $nameAction == "AddProduct";
    }

    public function execute(int $id, ?string $changeCount = null): void
    {
        $cart = $this->em->getRepository(Cart::class)->findOneBy([
            'sessionId' => $this->session->getId(),
            'product' => $id
        ]);

        if ($cart) {
            $cart->setCount($cart->getCount() + 1);
        } else {
            $this->session->set("flag", 1);
            $product = $this->em->getRepository(Product::class)->findOneBy(['id' => $id]);

            $cart = (new Cart())
                ->setProduct($product)
                ->setSessionId($this->session->getId())
                ->setCount(1);

            $this->em->persist($cart);
        }

        $this->em->flush();
    }
}
