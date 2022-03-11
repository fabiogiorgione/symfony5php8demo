<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Ramsey\Uuid\Uuid;

class UserFixture extends BaseFixture {

	protected static string $reference = 'user';

	/**
	 * @inheritDoc
	 */
	public function load(ObjectManager $manager) {
		$faker = Factory::create();
		for($i = 0; $i < 20; $i++) {
			$user = new User();
			$user->setUsername($faker->userName);
			$user->setPassword('password');
			$user->setEmail($faker->email);
			$this->setElemento($user, $i);
			//$user->setId(Uuid::uuid4());
			$manager->persist($user);
		}
		$manager->flush();
	}
}
