<?php


/**
 * User class
 */
class Product
{
	use Model;

	protected $table = 'products';

	protected $allowedColumns = [
		'name',
		'price',
	];

	public function validate($data)
	{
		$this->errors = [];

		if (empty($data['name'])) {
			$this->errors['name'] = "Name is required";
		}

		if (empty($data['price'])) {
			$this->errors['price'] = "Price is required";
		}

		if (empty($this->errors)) {
			return true;
		}

		return false;
	}
}
