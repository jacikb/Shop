<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Role\Role;

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
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setUsername('jacik');
            $user->setFirstName($this->faker->firstName();
            $user->setLastName($this->faker->lastName();
            $user->setEmail('jacik@toya.net.pl');
            $user->addRole(1);
            $user->setPassword('asd');
            $manager->persist($user);
            $product_count = rand(1, 20);
            for ($j = 0; $j < $product_count; $j++) {
                $product = new Product();
                $product->setOwner($user);
                $product->setStatus(1);
                $product->setName($this->faker->realText(50));
                $product->setDescription($this->faker->realText(500));
                $product->setCategory(rand(1, 5));
                $product->setPrice(rand(1, 100) * 10);
                $manager->persist($product);
            }
            $manager->flush();
        }
    }
}
