<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_controller extends CI_Controller {
    
	public function loginpage()
	{
        $this->load->view('tamplates/header');
        $this->load->view('pages/login');
    }
    
    public function login(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
       
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[15]');
        
        if($this->form_validation->run() === FALSE){
            $this->load->view('tamplates/header');
            $this->load->view('pages/login');
        }else{

              
                $email = $this->input->post('email');
                $password = $this->input->post('password');
               
              $id=$this->user_model->login($email,$password);
            

              
        
            if($id){     
                $newdata = array(
                    'id'  => $id,
                    'email'     => $email,
                    'logged_in' => TRUE
                );
               
                $this->session->set_userdata($newdata);  
                $this->session->set_flashdata('login', 'login successfull!');
                redirect('pages/index');
            }else{
                $this->session->set_flashdata('loginfail', 'your password and email invalid !');
                redirect('pages/login');
            }
        }

    }

    public function destroy(){
        session_destroy();
        redirect('pages/login');
    }

}