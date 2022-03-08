<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Name\FullyQualified;

/**
 * Orders
 * @ORM\Table(name="Orders")
 * @ORM\Entity
 */

class Order
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="email", type="string")
     */
    private $email;

    /**
     * @ORM\Column(name="number_phone", type="string")
     */
    private $numberPhone;

    /**
     * @ORM\Column(name="address", type="string")
     */
    private $address;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="App\Entity\Product")
     * @ORM\JoinTable(name="orders_products",
     *     joinColumns={@ORM\JoinColumn(name="order_id",referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="product_id",referencedColumnName="id")}
     *     )
     */
    private $products;

    public function __construct()
    {
        $this->pruducts = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNumberPhone()
    {
        return $this->numberPhone;
    }

    /**
     * @param mixed $numberPhone
     */
    public function setNumberPhone($numberPhone): void
    {
        $this->numberPhone = $numberPhone;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return ArrayCollection
     */
    public function getProducts(): ArrayCollection
    {
        return $this->products;
    }

    /**
     * @param Product $product
     * @return void
     */
    public function addProduct(Product $product): void
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
        }
    }

    /**
     * @param Product $product
     * @return void
     */
    public function removeProduct(Product $product)
    {
        if ($this->products->contains($product)) {
            $this->products->remove($product);
        }
    }

}
