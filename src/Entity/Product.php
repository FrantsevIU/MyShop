<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 * @ORM\Table(name="products")
 * @ORM\Entity
 */

class Product
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    /**
     * @ORM\Column(name="name", type="string", length=250, nullable=true)
     */
    private ?string $name;

    /**
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private ?string $price;

    /**
     * @ORM\Column(name="discription", type="string", length=250, nullable=true)
     */
    private ?string $discription;

    /**
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="category_id",referencedColumnName="id")
     */
    private Category $category;

    /**
     * @ORM\Column(type="string")
     */
    private string $numberOfProduct;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    public function getDiscription(): ?string
    {
        return $this->discription;
    }

    public function setDiscription(?string $discription): void
    {
        $this->discription = $discription;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getNumberOfProduct(): string
    {
        return $this->numberOfProduct;
    }

    public function setNumberOfProduct($numberOfProduct): void
    {
        $this->numberOfProduct = $numberOfProduct;
    }



}
