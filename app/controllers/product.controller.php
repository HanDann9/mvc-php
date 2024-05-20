<?php

/**
 * Home controller
 */
class ProductController
{
	use Controller;

	protected $product;

	public function __construct()
	{
		$this->product = new Product();
	}

	public function index()
	{
		$data['products'] = $this->product->findAll();
		$data['page'] = 'product';
		$this->view('products/index', $data);
	}

	public function create()
	{
		$data['page'] = 'product';
		$this->view('products/create', $data);
	}

	public function handleCreate()
	{
		if (!$this->product->validate($_POST)) {
			$data['errors'] = $this->product->errors;
			http_response_code(422);
			echo json_encode($data);
			exit;
		}

		$this->product->insert($_POST);
		$data['success'] = true;

		http_response_code(200);
		echo json_encode($data);
		exit;
	}

	public function edit($id)
	{
		$arr['id'] = $id;
		$data['product'] = $this->product->where($arr);
		$data['page'] = 'product';
		$this->view('products/edit', $data);
	}

	public function handleEdit($id)
	{
		if (!$this->product->validate($_POST)) {
			$data['errors'] = $this->product->errors;
			http_response_code(422);
			echo json_encode($data);
			exit;
		}

		$this->product->update($id, $_POST);
		$data['success'] = true;

		http_response_code(200);
		echo json_encode($data);
		exit;
	}

	public function delete($id)
	{
		$this->product->delete($id);
		$data['success'] = true;

		http_response_code(200);
		echo json_encode($data);
		exit;
	}
}
