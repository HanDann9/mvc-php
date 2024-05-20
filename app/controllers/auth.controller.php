<?php

/**
 * Login controller
 */
class AuthController
{
    use Controller;

    public function index()
    {
        $this->view("auth/login");
    }

    public function showFormRegister()
    {
        $this->view("auth/signup");
    }

    public function handle()
    {
        $user = new User();

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

    public function handleRegister()
    {
        $user = new User();

        if (!$user->validateCreate($_POST)) {
            $data['errors'] = $user->errors;
            http_response_code(422);
            echo json_encode($data);
            exit;
        }
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user->insert($_POST);
        $data['success'] = true;

        http_response_code(200);
        echo json_encode($data);
        exit;
    }

    public function logout()
    {
        if (!empty($_SESSION['user'])) {
            unset($_SESSION['user']);
        }

        redirect('login');
    }
}
