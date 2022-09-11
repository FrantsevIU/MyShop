<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 * @ORM\Table(name="orders")
 * @ORM\Entity
 */

class Order
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    /**
     * @ORM\Column(name="name", type="string")
     */
    private string $name;

    /**
     * @ORM\Column(name="email", type="string")
     */
    private string $email;

    /**
     * @ORM\Column(name="number_phone", type="string")
     */
    private string $numberPhone;

    /**
     * @ORM\Column(name="address", type="string")
     */
    private string $address;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Product")
     * @ORM\JoinTable(name="orders_products",
     *     joinColumns={@ORM\JoinColumn(name="order_id",referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="product_id",referencedColumnName="id")}
     *     )
     */
    private ArrayCollection $products;

    public function __construct()
    {
        $this->pruducts = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getNumberPhone(): string
    {
        return $this->numberPhone;
    }

    public function setNumberPhone(string $numberPhone): void
    {
        $this->numberPhone = $numberPhone;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getProducts(): ArrayCollection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
        }
        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->remove($product);
        }
        return $this;
    }

}
