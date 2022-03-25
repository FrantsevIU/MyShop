<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @ORM\Table (name="IpUser")
 */
class IpUser
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    /**
     * @var User
     * @ORD\ManyToOne(targetEntity="APP/Entity/User")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    private User $user;

    /**
     * @var int
     * @ORM\Column (name="ip", type="bigint", nullable=false)
     */
    private int $ip;

    /**
     * @var \DateTime
     * @ORM\Column (name="create_at", type="datetime", nullable=false)
     */
    private \DateTime $createAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getIp(): int
    {
        return $this->ip;
    }

    /**
     * @param int $ip
     */
    public function setIp(int $ip): void
    {
        $this->ip = $ip;
    }

    /**
     * @return \DateTime
     */
    public function getCreateAt(): \DateTime
    {
        return $this->createAt;
    }

    /**
     * @param \DateTime $createAt
     */
    public function setCreateAt(\DateTime $createAt): void
    {
        $this->createAt = $createAt;
    }
}
