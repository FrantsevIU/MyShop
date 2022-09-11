<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Mixed_;

/**
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string")
     * @ORM\Column(name="name", type="string", length=250, nullable=true)
     */
    private ?string $name;

    /**
     * ORM\Column(type="integer")
     * @ORM\Column(name="parrent_id", type="integer", nullable=false)
     */

    private ?int $parrentId;

    /**
     * @ORM\Column(type="string")
     * @ORM\Column(name="propertiesId", type="string", nullable=true)
     */
    private ?string $propertiesId;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getParrentId(): int
    {
        return $this->parrentId;
    }

    public function setParrentId(?int $parrentId): void
    {
        $this->parrentId = $parrentId;
    }

    /**
     * @return string
     */
    public function getPropertiesId(): ?string
    {
        return $this->propertiesId;
    }

    /**
     * @param string $propertiesId
     */
    public function setPropertiesId(?string $propertiesId): void
    {
        $this->propertiesId = $propertiesId;
    }


}
