<?php

namespace App\Repository;


use App\Entity\Cart;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\UserInterface;

class CartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cart::class);
    }

    public function findItemProductBySessionIdOrUserId(string $sessionid, ?UserInterface $user)
    {
        $qb = $this->createQueryBuilder("cart");

        if (NULL === $user) {
            $qb->where("cart.sessionid=:sessionid")->setParameter("sessionid", $sessionid);
        } else {
            $qb->where("cart.user_id=:user")->setParameter("user", $user->getId());

        }

        return $qb->getQuery()->getResult();

    }

//    public function findOrderBySessionOrUserId()
//    {
//
//    }
}

