<?php

declare(strict_types=1);

namespace App\Service\Cart;

use App\Entity\Cart;
use App\Service\Impl\CartServiceInterface;
use Doctrine\ORM\EntityManagerInterface;

class CartChangeProductService implements CartServiceInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function isAction(string $nameAction): bool
    {
        return $nameAction == "ChangeProduct";
    }

    public function execute(int $id, ?string $changeCount = null): void
    {
        $itemCart = $this->em->getRepository(Cart::class)->find($id);
        if ($changeCount == 'plus') {
            $itemCart->setCount($itemCart->getCount() + 1);
        } elseif ($changeCount == 'minus' && $itemCart->getCount() <= 1) {
            $this->em->remove($itemCart);
        } else {
            $itemCart->setCount($itemCart->getCount() - 1);
        }

        $this->em->flush();
    }
}
