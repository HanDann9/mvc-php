<?php


/**
 * User class
 */
class User
{
	use Model;

	protected $table = 'users';

	protected $allowedColumns = [
		'name',
		'email',
		'password',
		'introduce'
	];

	public function validateCreate($data)
	{
		$user = new User();
		$this->errors = [];

		if (empty($data['email'])) {
			$this->errors['email'] = "Email is required";
		} else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['email'] = "Email is not valid";
		} else {
			$row = $user->first(['email' => $data['email']]);
			if ($row) {
				$this->errors['email'] = "Email is already in the database";
			}
		}

		// if (empty($data['name'])) {
		// 	$this->errors['name'] = "Name is required";
		// }

		if (empty($data['password'])) {
			$this->errors['password'] = "Password is required";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function validateEdit($data)
	{
		$user = new User();
		$this->errors = [];

		if (empty($data['email'])) {
			$this->errors['email'] = "Email is required";
		} else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['email'] = "Email is not valid";
		} else {
			$row = $user->first(['email' => $data['email']]);
			if ($row && $data['email_original'] != $data['email']) {
				$this->errors['email'] = "Email is already in the database";
			}
		}

		if (empty($data['name'])) {
			$this->errors['name'] = "Name is required";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}

	public function validateLogin($data)
	{
		$user = new User();
		$this->errors = [];

		$email = isset($data['email']) ? $data['email'] : '';
		$password = isset($data['password']) ? $data['password'] : '';

		if (empty($email)) {
			$this->errors['email'] = "Email is required";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->errors['email'] = "Invalid email format";
		} else {
			$row = $user->first(['email' => $email]);

			if (!$row) {
				$this->errors['email'] = "Email not exists";
			} elseif (!password_verify($password, $row['password'])) {
				$this->errors['email'] = "Password is incorrect";
			}
		}

		if (empty($password)) {
			$this->errors['password'] = "Password is required";
		}

		return empty($this->errors);
	}
}
