<?php

class User extends CI_Controller {

	public function index(): void
	{
        
        $this->load->view('users');
    }

    public function dashboard(): void
	{
        $this->load->view('dashboard');
    }

    public function signup(): void
	{
        $this->load->view('signup');
    }

    public function inbox(): void
	{
        $this->load->view('inbox');
    }

    public function users(): void
	{
        $this->load->view('users');
    }

    public function user($id) {
        $this->load->view('user/'.$id);
    }

    public function edit(): void
	{
        $this->load->view('user_update');
    }

    public function login() {
        $data = [
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password')
        ];

        $this->load->model('UserModel');
        $users = $this->UserModel->get_user($data);

        $this->load->view('login');
    }

}
