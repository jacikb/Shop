<?php

namespace App\Entity;

use App\Entity\StatusDictionary;
use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @var User`
     * @ORM\ManyToOne(targetEntity="User", inversedBy="products")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * @var StatusDictionary
     * @ORM\ManyToOne(targetEntity="App\Entity\StatusDictionary", inversedBy="products")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message = "Nazwa nie może być pusta")
     * @Assert\Length(
     *      min=5,
     *      max=255,
     *      minMessage="Nazwa musi mieć minimum 5 znaków!",
     *      maxMessage="Nazwa nie może być dłuższa niż 255 znakóœ!"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message = "Opis nie może być pusty")
     * @Assert\Length(
     *      min=20,
     *      minMessage="Opis musi mieć minimum 20 znaków!",
     * )
     */
    private $description;
    /**
     * @ORM\Column(type="integer")
     */
//    private $category;


    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @var \DateTime $createAt
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="create_at", type="datetime")
     */

    private $createAt;

    /**
     * @var \DateTime $updateAt
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="update_at", type="datetime")
     */
    private $updateAt;


    public function __construct()
    {

        // $this->status = new ArrayCollection();
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return Product
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get User
     *
     * @return User
     *
     */
    public function getUser(): ?string
    {
        return $this->user;
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
//    public function getCategory(): ?int
//    {
//        return $this->category;
//    }

    /**
     * @param int $category
     * @return Product
     */
//    public function setCategory(int $category): self
//    {
//        $this->category = $category;
//
//        return $this;
//    }

    /**
     * @return mixed
     */
    public function getName(): ?string
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
    public function getDescription(): ?string
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
        $this->status = $statusDictionary;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreateAt(): ?\DateTime
    {
        return $this->createAt;
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreateAt(\DateTime $created_at): void
    {
        $this->createAt = $created_at;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateAt(): ?\DateTime
    {
        return $this->updateAt;
    }

    /**
     * @param \DateTime $updateAt
     */
    public function setUpdateAt(\DateTime $updateAt): void
    {
        $this->updateAt = $updateAt;
    }

    public function __toString()
    {
        return $this->name;
    }
}
