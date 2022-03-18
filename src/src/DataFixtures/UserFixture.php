<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends BaseFixture
{
    protected static string $reference = 'user';

    protected static string $password = 'password';

    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        // create 2 0 users
        for ($i = 0; $i < static::$count; $i++) {
            $user = new User();
            $user->setName($faker->name);
            $user->setUsername($faker->userName);
            $pw = $this->encoder->hashPassword($user, self::$password);
            $user->setPassword($pw);
            $user->setEmail($faker->email);
            $this->setElemento($user, $i);
            $manager->persist($user);
        }

        $manager->flush();
    }

    /*public function getDependencies(): array
    {
        return [
            AppFixtures::class
        ];
    }*/
}