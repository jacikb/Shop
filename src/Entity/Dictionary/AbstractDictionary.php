<?php

namespace App\Entity\Dictionary;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 **/
abstract class AbstractDictionary
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $enabled;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }


    public function __toString()
    {
        return $this->name;
    }

}