<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class display_controller extends CI_Controller {
    
    public function display()
	{
        $res['result']=$this->user_model->show();
    //    print_r($res['result']);
    //    exit;
        $this->load->view('tamplates/header');
        $this->load->view('pages/display',$res);
    }
        
   

}
