<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;

abstract class BaseFixture extends Fixture {
	protected static string $reference = '';
	protected static int    $count     = 20;

	protected function setElemento($elemento, $i) {
		$this->addReference(static::$reference . '_' . $i, $elemento);
	}

	protected function getElementi($baseFixutre): array {
		$Objs = [];

		for ($i = 0; $i < $baseFixutre::$count; $i++) {
			$Objs[] = $this->getReference($baseFixutre::$reference . '_' . $i);
		}

		return $Objs;
	}
}
