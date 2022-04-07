<?php

namespace App\EventListener;

use App\Entity\IpUser;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class IpControlEventListener
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        /** @var User $user */
        $ipUser = $event->getRequest()->getClientIp();
        $ipDb = $this->em->getRepository(IpUser::class)->findOneBy([
            'user' => $user,
            'ip' => ip2long($ipUser)
        ]);
        if (!$ipDb) {
            $event->setResponse(new RedirectResponse('/shop/login'));
        }
    }
}
