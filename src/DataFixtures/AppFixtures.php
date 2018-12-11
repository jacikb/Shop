<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $product = new Product();
         $product->setName('Telefon');
         $product->setDescription('Opis telefonu');
         $product->setCategory(1);
         $product->setPrice(500);
         $manager->persist($product);

        $manager->flush();
    }
}
