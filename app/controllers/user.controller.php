<?php

class UserController
{
    use Controller;

    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $data['users'] = $this->user->findAll();
        $data['page'] = 'user';
        $this->view('users/index', $data);
    }

    public function create()
    {
        $data['page'] = 'user';
        $this->view('users/create', $data);
    }

    public function handleCreate()
    {
        if (!$this->user->validateCreate($_POST)) {
            $data['errors'] = $this->user->errors;
            http_response_code(422);
            echo json_encode($data);
            exit;
        }

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $this->user->insert($_POST);
        $data['success'] = true;

        http_response_code(200);
        echo json_encode($data);
        exit;
    }

    public function edit($id)
    {
        $arr['id'] = $id;
        $data['user'] = $this->user->where($arr);
        $data['page'] = 'user';
        $this->view('users/edit', $data);
    }

    public function handleEdit($id)
    {
        if (!$this->user->validateEdit($_POST)) {
            $data['errors'] = $this->user->errors;
            http_response_code(422);
            echo json_encode($data);
            exit;
        }

        $this->user->update($id, $_POST);
        $data['success'] = true;

        http_response_code(200);
        echo json_encode($data);
        exit;
    }

    public function delete($id)
    {
        $this->user->delete($id);
        $data['success'] = true;

        http_response_code(200);
        echo json_encode($data);
        exit;
    }
}
