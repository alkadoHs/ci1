<?php

class User extends CI_Controller {

	public function index()
	{
        
        $this->load->view('users');
    }

    public function dashboard()
	{
        if($this->session->userdata('user_id')) {
           $this->load->view('dashboard');
        } else {
            return redirect("user/login");
        }
    }

    public function signup()
	{
        $this->load->view('signup');
    }

    public function inbox()
	{
        $this->load->view('inbox');
    }

    public function users()
	{
        $this->load->view('users');
    }

    public function user($id) {
        $this->load->view('user/'.$id);
    }

    public function edit()
	{
        $this->load->view('user_update');
    }

    public function login() {
        $this->load->view('login');
    }

    public function signin() {
         $data = [
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password')
        ];

        $this->load->model('UserModel');
        $user = $this->UserModel->get_user($data);
        
        if($user !== NULL) {
            $user_session = [
                "user_id" => $user->id,
                "username" => $user->username,
                "email" => $user->email
            ];
            $this->session->set_userdata( $user_session );
            redirect("dashboard");
        } else {
            $this->session->set_flashdata('errorLogin', 'The email or password you entered is incorrect, try again!');

            redirect("user/login");
        }
    }

            public function logout()
            { 
               $this->session->unset_userdata('user_id');
               
               return redirect("user/login");
            }

}
