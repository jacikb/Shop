<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @var \Faker\Factory
     */
    private $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }

    public function load(ObjectManager $manager)
    {
for($i=0;$i<100;$i++) {
    $product = new Product();
    $product->setStatus(1);
    $product->setName($this->faker->realText(20));
    $product->setDescription($this->faker->realText(500));
    $product->setCategory(1);
    $product->setPrice(500);
    $manager->persist($product);
}
        $manager->flush();
    }
}
