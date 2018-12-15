<?php

namespace App\Entity;

use App\Entity\Dictionary\StatusDictionary;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="products")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     */
    private $owner;


    /**
     * @var StatusDictionary[]|ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Dictionary\StatusDictionary", mappedBy="id")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;
    /**
     * @ORM\Column(type="integer")
     */
    private $category;


    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @var \DateTime $created_at
     *
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @var \DateTime $updated_at
     *
     * @ORM\Column(type="datetime")
     */
    private $updated_at;


    public function __construct()
    {

        $this->status = new ArrayCollection();
    }

    /**
     * Set owner
     *
     * @param integer $owner
     *
     * @return Product
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * Get owner
     *
     * @return User
     *
     */
    public function getOwner()
    {
        return $this->owner;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return StatusDictionary[]|ArrayCollection[]
     */
    public function getStatus(): ?StatusDictionary
    {
        return $this->status;
    }

    /**
     * @param StatusDictionary $status
     * @return Product
     */
    public function setStatus(StatusDictionary $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCategory(): ?int
    {
        return $this->category;
    }

    /**
     * @param int $category
     * @return Product
     */
    public function setCategory(int $category): self
    {
        $this->category = $category;

        return $this;
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }


    /**
     * @return StatusDictionary[]|ArrayCollection
     */
    public function getStatusDictionary()
    {
        return $this->status;
    }

    /**
     * @param StatusDictionary $astatus
     *
     * @return $this
     */
    public function addStatus(StatusDictionary $statusDictionary)
    {
        $this->status[] = $statusDictionary;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreatedAt(\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    /**
     * @param \DateTime $updated_at
     */
    public function setUpdatedAt(\DateTime $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    public function __toString()
    {
        return $this->name;
    }
}
