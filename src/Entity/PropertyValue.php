<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PropertyValueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PropertyValueRepository::class)
 */
class PropertyValue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product")
     * @ORM\JoinColumn(name="product_id",referencedColumnName="id")
     */
    private ?Product $productId;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PropertiesProducts")
     * @ORM\JoinColumn(name="propertyid",referencedColumnName="id")
     */
    private ?PropertiesProducts $propertyid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $value;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getProductId(): ?Product
    {
        return $this->productId;
    }


    public function setProductId(?Product $productId): void
    {
        $this->productId = $productId;
    }


    public function getPropertyid(): ?PropertiesProducts
    {
        return $this->propertyid;
    }


    public function setPropertyid(?PropertiesProducts $propertyid): void
    {
        $this->propertyid = $propertyid;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }
}


