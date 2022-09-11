<?php

declare(strict_types=1);

namespace App\Service\Cart;

use App\Entity\Cart;
use App\Service\Impl\CartServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartClearProductService implements CartServiceInterface
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
        return $nameAction == "clearProduct";
    }

    public function execute(int $id, ?string $changeCount = null): void
    {
        $item = $this->em->getRepository(Cart::class)
            ->findBy(["sessionId" => $this->session->getId()]);

        foreach ($item as $value) {
            $this->em->remove($value);
        }

        $this->em->flush();
    }
}
