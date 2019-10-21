<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signup_controller extends CI_Controller {

	
	public function signup()
	{
        $this->load->view('tamplates/header');
        $this->load->view('pages/signup');
	}

	public function formvalidation()
	{
		 //form validation
		
		$this->form_validation->set_rules('fname', 'FirstName', 'required');
		$this->form_validation->set_rules('lname', 'LastName', 'required');
		$this->form_validation->set_rules('birthday', 'Birthdate', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		if (empty($_FILES['photo']['name']))
		{
    	$this->form_validation->set_rules('photo', 'Photo', 'required');
		}
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[15]');

		if($this->form_validation->run() === FALSE){
			
			 $error =validation_errors();
			 echo json_encode(['error'=>$error]);
			 return false;
			
		}else{
			return true;
		}
		
	}
	public function insert(){
		if($this->formvalidation()){
			$file_name = time() . $_FILES['photo']['name'];
			
			$config['upload_path']   = './assets/uploads/'; 
			$config['allowed_types'] = 'jpg|gif|png|jpeg|JPG|PNG'; 
			$config['max_size']      = 5242880;	
			$config['file_name']    = $file_name;  
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('photo')) {
				$error = array('error' => $this->upload->display_errors()); 
				//$this->load->view('pages/signup', $error); 
			}
			else { 
				$photo = $this->upload->data('file_name');	
				$res=$this->user_model->insert($photo);
			
				if($res){
					
					echo json_encode(['success'=>'Record added successfully.']);
					$this->session->set_flashdata('signup', 'singup successfully!');
					// redirect('login_controller/loginpage');
				}else{
					$this->session->set_flashdata('signupfail', 'singup does not successfully!');
					redirect('pages/signup');
				}
			}
		}
		
	}

	
}
