<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class add_controller extends CI_Controller {

    public function add()
	{   
		// echo "calll";exit;
        $id = $this->input->get('id', TRUE);
		$res['result']=$this->user_model->edit($id);
        $this->load->view('tamplates/header');
        $this->load->view('pages/add',$res);
    }
    public function formvalidation(){
		$this->form_validation->set_rules('fname', 'FirstName', 'required');
		$this->form_validation->set_rules('lname', 'LastName', 'required');
		$this->form_validation->set_rules('birthday', 'Birthdate', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		if (empty($_FILES['photo']['name']))
		{
    	$this->form_validation->set_rules('photo_old', 'Photo', 'required');
		}
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if($this->form_validation->run() === FALSE){
			$error =validation_errors();
			
			echo json_encode(['error'=>$error]);

			return false;
		}else{
			return true;	
		}

	}
    public function edit()
	{	
		
		if($this->formvalidation()) 
		{		

				// print_r($this->input->post('photo_old'));

			
				$photo = false ; 
			
				if($_FILES['photo']['name']){
					
					$file_name = time() . $_FILES['photo']['name'];
				
					$config['upload_path']   = './assets/uploads/'; 
					$config['allowed_types'] = 'jpg|gif|png|jpeg|PNG'; 
					$config['max_size']      = 5242880; 
					$config['file_name']    = $file_name;  
					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('photo')) {
						$error = array('error' => $this->upload->display_errors()); 
						
						if($error){
							$this->session->set_flashdata('Edit', 'Error regarding photo!');
							redirect('pages/add');
						}
						
						// $this->load->view('pages/signup', $error); 
					}
					else { 
						$file ='assets/uploads/'.$this->input->post('photo_old');
						
						unlink($file);

						$photo = $this->upload->data('file_name');	
				} 
			}
				$id = $this->input->post('id');
				$data = array(
					'fname' => $this->input->post('fname'),
					'lname'    => $this->input->post('lname'),
					'birthday'    => $this->input->post('birthday'),
					'gender'    => $this->input->post('gender'),
					'email'    => $this->input->post('email'),
				);

				if($photo){
					$data['photo'] = $photo;
				}
				$res=$this->user_model->update($id,$data);
				if($res){
					echo json_encode(['success'=>'Record update successfully.']);
					$this->session->set_flashdata('Edit', 'Edit successfully!');
					
						//redirect('display_controller/display');
					}else{
						$this->session->set_flashdata('Edit', 'Edit does not successfully!');
						redirect('pages/add');
				 }
		
	}
}

}