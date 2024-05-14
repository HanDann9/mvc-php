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

		if (empty($data['name'])) {
			$this->errors['name'] = "Name is required";
		}

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

		if (empty($data['email'])) {
			$this->errors['email'] = "Email is required";
		} else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$this->errors['email'] = "Invalid email format";
		} else {
			$row = $user->first(['email' => $data['email']]);

			if (!$row) {
				$this->errors['email'] = "Email not exists";
			} else if ($row->password != $data['password']) {
				$this->errors['email'] = "Invalid email or password";
			}
		}

		if (empty($data['password'])) {
			$this->errors['password'] = "Password is required";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}
}
