<?php

/**
 * Home controller
 */
class Home
{
	use Controller;

	public function index()
	{
		$user = new User();
		$userSession = $_SESSION['user'] ?? null;

		if (!$userSession) {
			redirect('login');
		}
		// $data['users'] = json_decode(json_encode($user->findAll()), true);
		$data['users'] = $user->findAll();
		$data['username'] = $userSession->email;
		$this->view('home', $data);
	}

	public function create()
	{
		$user = $_SESSION['user'] ?? null;

		if (!$user) {
			redirect('login');
		}

		$data['username'] = $user->email;
		$this->view('create', $data);
	}

	public function handle_create()
	{
		$user = new User();
		$userSession = $_SESSION['user'] ?? null;

		if (!$userSession) {
			redirect('login');
		}

		if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
			http_response_code(405);
			echo 'Method not allowed';
			exit;
		}

		if (!$user->validateCreate($_POST)) {
			$data['errors'] = $user->errors;
			http_response_code(422);
			echo json_encode($data);
			exit;
		}

		$user->insert($_POST);
		$data['success'] = true;

		http_response_code(200);
		echo json_encode($data);
		exit;
	}

	public function edit($id)
	{
		$user = new User();
		$userSession = $_SESSION['user'] ?? null;

		if (!$userSession) {
			redirect('login');
		}

		$arr['id'] = $id;
		$data['user_data'] = $user->where($arr);
		$data['username'] = $userSession->email;
		$this->view('edit', $data);
	}

	public function handle_edit($id)
	{
		$user = new User();
		$userSession = $_SESSION['user'] ?? null;

		if (!$userSession) {
			redirect('login');
		}

		if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
			http_response_code(405);
			echo 'Method not allowed';
			exit;
		}

		if (!$user->validateEdit($_POST)) {
			$data['errors'] = $user->errors;
			http_response_code(422);
			echo json_encode($data);
			exit;
		}

		$user->update($id, $_POST);
		$data['success'] = true;

		http_response_code(200);
		echo json_encode($data);
		exit;
	}

	public function delete($id)
	{
		$user = new User();
		$userSession = $_SESSION['user'] ?? null;

		if (!$userSession) {
			redirect('login');
		}

		$user->delete($id);
		$data['success'] = true;

		http_response_code(200);
		echo json_encode($data);
		exit;
	}
}
