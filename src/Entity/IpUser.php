<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @ORM\Entity
 * @ORM\Table(name="IpUser")
 */
class IpUser
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private User $user;

    /**
     * @ORM\Column (name="ip", type="bigint", nullable=false)
     */
    private int $ip;

    /**
     * @ORM\Column (name="create_at", type="datetime", nullable=false)
     */
    private \DateTime $createAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getIp(): int
    {
        return $this->ip;
    }

    public function setIp(int $ip): self
    {
        $this->ip = $ip;
        return $this;
    }

    public function getCreateAt(): \DateTime
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTime $createAt): self
    {
        $this->createAt = $createAt;
        return $this;
    }
}
