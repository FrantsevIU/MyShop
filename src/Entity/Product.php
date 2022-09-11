<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
    private ?int $price;

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
     * @ORM\Column(type="integer")
     */
    private int $numberOfProduct;

    /**
     * @ORM\Column (type="string")
     */
    private ?string $imgProduct;

    /**
     * @ORM\Column (type="array", nullable=true)
     */
    protected ?Collection $tags;


    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;

    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function getDiscription(): ?string
    {
        return $this->discription;
    }

    public function setDiscription(?string $discription): self
    {
        $this->discription = $discription;
        return $this;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function getNumberOfProduct(): int
    {
        return $this->numberOfProduct;
    }

    public function setNumberOfProduct(int $numberOfProduct): self
    {
        $this->numberOfProduct = $numberOfProduct;
        return $this;
    }


    public function getImgProduct(): ?string
    {
        return $this->imgProduct;
    }


    public function setImgProduct(?string $imgProduct): self
    {
        $this->imgProduct = $imgProduct;
        return $this;
    }


    public function getTags(): ?Collection
    {
        return $this->tags;
    }

    public function addTag(PropertiesProducts $tag): void
    {
        $this->tags->add($tag);
    }

    public function removeTag(PropertiesProducts $tag): void
    {
        $this->tags->removeElement($tag);
    }

}
