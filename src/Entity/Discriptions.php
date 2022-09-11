<?php

namespace App\Entity;

use App\Repository\DiscriptionsProductsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiscriptionsProductsRepository::class)
 */
class Discriptions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_product;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $disc_1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $disc_2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $disc_3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $disc_5;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduct(): ?int
    {
        return $this->id_product;
    }

    public function setIdProduct(?int $id_product): self
    {
        $this->id_product = $id_product;

        return $this;
    }

    public function getDisc1(): ?string
    {
        return $this->disc_1;
    }

    public function setDisc1(?string $disc_1): self
    {
        $this->disc_1 = $disc_1;

        return $this;
    }

    public function getDisc2(): ?string
    {
        return $this->disc_2;
    }

    public function setDisc2(?string $disc_2): self
    {
        $this->disc_2 = $disc_2;

        return $this;
    }

    public function getDisc3(): ?string
    {
        return $this->disc_3;
    }

    public function setDisc3(?string $disc_3): self
    {
        $this->disc_3 = $disc_3;

        return $this;
    }

    public function getDisc5(): ?string
    {
        return $this->disc_5;
    }

    public function setDisc5(?string $disc_5): self
    {
        $this->disc_5 = $disc_5;

        return $this;
    }
}
