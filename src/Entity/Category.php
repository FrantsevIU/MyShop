<?php

namespace App\Entity;

use App\Repository\CategoryIdRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryIdRepository::class)
 * @ORM\Table (name="categories")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     * @ORM\Column(name="name", type="string", length=250, nullable=true)
     */
    private $name;

    /**
     * @var int
     * @ORM\Column(name="parrent_id", type="integer", nullable=false)
     */

    private $parrentId;

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

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getParrentId(): int
    {
        return $this->parrentId;
    }

    /**
     * @param int $parrentId
     */
    public function setParrentId(int $parrentId): void
    {
        $this->parrentId = $parrentId;
    }


}
