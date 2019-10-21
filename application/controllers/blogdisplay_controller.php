<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blogdisplay_controller extends CI_Controller {
    public function blogdisplay()
    {    
        $user_id = $this->session->userdata('id');
        $res['result']=$this->blog_model->show($user_id);
        $this->load->view('tamplates/header');
        $this->load->view('pages/blogdisplay',$res);
    }

    public function blogsdisplay()
    {    
        // $user_id = $this->session->userdata('id');
        $res['result']=$this->blog_model->showAll();
        $this->load->view('tamplates/header');
        $this->load->view('pages/allblogs',$res);
    }

}