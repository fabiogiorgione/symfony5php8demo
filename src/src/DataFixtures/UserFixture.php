<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Ramsey\Uuid\Uuid;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends BaseFixture {

	protected static string $reference = 'user';
	private $encoder;

	public function __construct(UserPasswordHasherInterface $encoder) {
		$this->encoder = $encoder;
	}

	/**
	 * @inheritDoc
	 */
	public function load(ObjectManager $manager) {
		$faker = Factory::create();
		for($i = 0; $i < 20; $i++) {
			$user = new User();
			$user->setUsername($faker->userName);
			$hashed_password = $this->encoder->hashPassword($user, 'password');
			$user->setPassword($hashed_password);
			$user->setEmail($faker->email);
			$this->setElemento($user, $i);
			//$user->setId(Uuid::uuid4());
			$manager->persist($user);
		}
		$manager->flush();
	}
}
