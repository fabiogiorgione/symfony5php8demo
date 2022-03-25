<?php

namespace App\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class LoginModel {
	/**
	 * @Assert\NotBlank()
	 */
	private $username;
	/**
	 * @Assert\NotBlank()
	 */
	private $password;

	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password): void {
		$this->password = $password;
	}

	/**
	 * @return mixed
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @param mixed $username
	 */
	public function setUsername($username): void {
		$this->username = $username;
	}


}
