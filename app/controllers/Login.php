<?php

/**
 * Login controller
 */
class Login
{
    use Controller;

    public function index()
    {
        $this->view("login");
    }

    public function handle()
    {
        $user = new User();

        if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
            http_response_code(405);
            echo 'Method not allowed';
            exit;
        }

        if (!$user->validateLogin($_POST)) {
            $data['errors'] = $user->errors;
            http_response_code(422);
            echo json_encode($data);
            exit;
        }

        $row = $user->first(['email' => $_POST['email']]);
        $_SESSION['user'] = $row;
        $data['success'] = true;

        http_response_code(200);
        echo json_encode($data);
        exit;
    }
}
