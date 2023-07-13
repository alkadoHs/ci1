<?php

class Post extends CI_Controller
{
    public function index()
    {
        $this->load->view('dashboard');
    }

    public function create()
    {
        $this->load->view('post_create');
    }
}