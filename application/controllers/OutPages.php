<?php

class OutPages extends CI_Controller
{
    public function page_not_found()
    {
        $this->load->view('404');
    }
}