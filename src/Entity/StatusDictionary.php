<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Dictionary\AbstractDictionary;
use App\Entity\Product;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\StatusDictionaryRepository")
 */
class StatusDictionary extends AbstractDictionary
{

    /**
     * @var products[]|ArrayCollection
     * @ORM\OneToMany(targetEntity="Product", mappedBy="status")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $products;

    /**
     * User constructor
     */
    public function __construct()
    {
        //parent::__construct();
        $this->products = new ArrayCollection();
    }

    /**
     * @return products[]|ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product $Product
     *
     * @return $this
     */
    public function addProducts(Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

}
