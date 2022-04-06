<?php

namespace App\EventListener;

use App\Entity\IpUser;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Event\AuthenticationSuccessEvent;
use Symfony\Component\Security\Core\Exception\AuthenticationException;


class IpLoginEventListener
{
    private EntityManagerInterface $em;
    protected RequestStack $requestStack;

    public function __construct(EntityManagerInterface $em, RequestStack $requestStack)
    {
        $this->em = $em;
        $this->requestStack = $requestStack;
    }

    public function __invoke(AuthenticationSuccessEvent $event)
    {
        /** @var User $user */
        $user = $event->getAuthenticationToken()->getUser();
        $ipUser = $this->requestStack->getCurrentRequest()->getClientIp();
        $ipDb = $this->em->getRepository(IpUser::class)->findOneBy([
            'user' => $user,
            'ip' => ip2long($ipUser)
        ]);
        if (!$ipDb) {
            $ipadd = (new IpUser())->setIp(ip2long($ipUser))->setUser($user);
            $this->em->persist($ipadd);
            $this->em->flush();
            throw new AuthenticationException();
        }

    }
}
