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

        $user = new User();
        $user->setUsername('jacik');
        $user->setFirstName('Jacek');
        $user->setLastName('Brzeczyszczykiewicz');
        $user->setEmail('jacik@toya.net.pl');
        $user->addRole(1);
        $user->setPassword('asd');
        $manager->persist($user);
        for ($j = 0; $j < 20; $j++) {
            $product = new Product();
            $product->setOwner($user);
            $product->setStatus(1);
            $product->setName($this->faker->realText(20));
            $product->setDescription($this->faker->realText(500));
            $product->setCategory(rand(1, 5));
            $product->setPrice(rand(1, 100) * 10);
            $manager->persist($product);
        }
        $manager->flush();
    }
}
