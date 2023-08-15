<?php
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        
    }
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

    public function create()
	{
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('img'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    return $error;
                }
                else
                {
                    $data = $this->upload->data();
                    
                    $input_data =  [
                        "email" => $this->input->post('email'),
                        "username" => $this->input->post('username'),
                        "password" => $this->input->post('password'),
                        "img" => "assets/uploads/".$data['orig_name'],
                   ];

                   $query = $this->UserModel->insert_user($input_data);

                   if($query === FALSE) {
                     $this->session->set_flashdata('userExist', 'User already exit!');
                     redirect("user/signup");
                   } else {
                     redirect("user/users");
                   }
                }

    }

    

    public function inbox()
	{
        $this->load->view('inbox');
    }

    public function users()
	{
         $q = $this->db->get('user');
        $users = $q->result();

        $this->load->view('users', ['users' => $users]);
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

        $user = $this->UserModel->get_user($data);
        
        if($user !== NULL) {
            $user_session = [
                "user_id" => $user->id,
                "username" => $user->username,
                "email" => $user->email,
                "image_url" => $user->img,
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
