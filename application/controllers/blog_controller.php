<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog_controller extends CI_Controller {
    public function blog()
    {
        $this->load->view('tamplates/header');
        $this->load->view('pages/blog');
    }

    public function blogvalidation()
    {   
        if (empty($_FILES['photo']['name'])) {
         $this->form_validation->set_rules('photo', 'Photo', 'required');
        } 
		$this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('discription', 'Discription', 'required');
        
        if($this->form_validation->run() === FALSE){
            $this->load->view('tamplates/header');
            $this->load->view('pages/blog');
            return false;   
       }else{

            return true;
       }
    }

    public function bloginsert()
    {
        if($this->blogvalidation()){
             $file_name = time() . $this->input->post('photo') ;
			$config['upload_path']   = './assets/uploads/blog'; 
			$config['allowed_types'] = 'jpg|gif|png|jpeg|JPG|PNG'; 
			$config['max_size']      = '5242880';	
			$config['file_name']    = $file_name;  
           
            $this->load->library('upload', $config);
           
			if (!$this->upload->do_upload('photo')) {
                print_r("hdfldfkjnsddd");
                exit;
                $error = array('error' => $this->upload->display_errors()); 
                $this->load->view('tamplates/header');
				$this->load->view('pages/blog', $error); 
			}
			else { 
                $photo = $this->upload->data('file_name');
            }
             $user_id = $this->session->userdata('id');

             print_r($user_id);
             $time = date('Y-m-d H:i:s');
            $data =  array(
                'photo' =>  $photo,
                'user_id' => $user_id,
                'title'    => $this->input->post('title'),
                'discription'    => $this->input->post('discription'),
                'time'      => $time
            );

            $res=$this->blog_model->insert($data);
            if($res){
            $this->session->set_flashdata('bloginsert', 'blog created successfully!');
            redirect('pages/blogdisplay');
            }else{
                $this->session->set_flashdata('bloginsertfail', 'blog does not reated successfully!');  
                redirect('pages/blog');
            }
        }
    }
}