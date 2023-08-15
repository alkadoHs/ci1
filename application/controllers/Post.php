<?php

class Post extends CI_Controller
{
    public function index()
    {
        $q = $this->db->select("*")->from('post')->join('user', 'post.user_id = user.id')->order_by('post.created_at', 'desc')->get();
        $posts = $q->result();
        //SELECT * FROM post JOIN user ON (post.user_id = user.id )
        
        $this->load->view('dashboard', ['posts' => $posts]);
    }

    public function create()
    {
        if($this->session->userdata('user_id')) {
            $this->load->view('post_create');
        } else {
            redirect('user/login');
        }
    }

    public function create_post()
    {
        $data = [
            "user_id" => $this->input->post('user_id'),
            "title" => $this->input->post('title'),
            "body" => $this->input->post('body')
        ];
        $this->db->insert('post', $data);

        redirect("dashboard");
    }
}