<?php

declare(strict_types=1);

namespace App\Service\Cart;

use App\Entity\Cart;
use App\Service\Impl\CartServiceInterface;
use Doctrine\ORM\EntityManagerInterface;

class CartDellProductService implements CartServiceInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function isAction(string $nameAction): bool
    {
        return $nameAction == "dellProduct";
    }

    public function execute(int $id, ?string $changeCount = null): void
    {
        $Item = $this->em->getRepository(Cart::class)->find($id);

        $this->em->remove($Item);
        $this->em->flush();
    }
}
