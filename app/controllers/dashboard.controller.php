<?php

class DashboardController
{
    use Controller;

    public function index()
    {
        $user = new User();
        $data['users'] = $user->findAll();
        $data['page'] = 'dashboard';
        $this->view('dashboard', $data);
    }
}
