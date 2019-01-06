<?php

namespace App\DataFixtures;

use App\Entity\StatusDictionary;
use App\Entity\User;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Provider\DateTime;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Role\Role;

class AppFixtures extends Fixture
{
    /**
     * @var \Faker\Factory
     */
    private $faker;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->faker = \Faker\Factory::create();
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $status = new StatusDictionary();
        $status->setName('PRIVATE');
        $status->setEnabled(true);
        $status->setCreateAt(new \DateTime());
        $status->setUpdateAt(new \DateTime());
        $manager->persist($status);
        $manager->flush();

        $status2 = new StatusDictionary();
        $status2->setName('PUBLIC');
        $status2->setEnabled(true);
        $status2->setCreateAt(new \DateTime());
        $status2->setUpdateAt(new \DateTime());

        $manager->persist($status2);
        $manager->flush();

        $user = new User();
        $user->setUsername('jacik');
        $user->setFirstName($this->faker->firstName());
        $user->setLastName($this->faker->lastName());
        $user->setEmail('jacik@toya.net.pl');
        $user->setLastLogin(new \DateTime());
        $user->addRole('ROLE_ADMIN');
        $user->setSalt('sdfgsdfgwfeg');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'poland'));
        $manager->persist($user);
        $manager->flush();

        for ($i = 0; $i < 3; $i++) {
            $user = new User();
            $user->setUsername($this->faker->userName());
            $user->setFirstName($this->faker->firstName());
            $user->setLastName($this->faker->lastName());
            $user->setEmail($this->faker->email());
            $user->setLastLogin(new \DateTime());
            $user->addRole('ROLE_USER');
            $user->setSalt('sdfgsdfgwfeg');
            $user->setPassword($this->passwordEncoder->encodePassword($user, 'aaaaaaaaa'));
            $manager->persist($user);
            $manager->flush();

            //  $manager->flush();
            $product_count = rand(1, 5);
            for ($j = 0; $j < $product_count; $j++) {
                $product = new Product();
                $product->setUser($user);
                if ($j == 3)
                    $product->setStatus($status);
                else
                    $product->setStatus($status2);
                $product->setName($this->faker->realText(50));
                $product->setDescription($this->faker->realText(500));
                // $product->setCategory(rand(1, 5));
                $product->setPrice(rand(1, 100) * 10);
                $product->setCreateAt($this->faker->dateTimeThisYear);
                $product->setUpdateAt($this->faker->dateTimeBetween());
                $manager->persist($product);
                $manager->flush();
                unset($product);
            }


        }
    }
}
