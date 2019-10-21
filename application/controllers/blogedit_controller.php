<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blogedit_controller extends CI_Controller {
    public function blogedit()
	{   
        $id = $this->input->get('id', TRUE);
        $res['result']=$this->blog_model->edit($id);
        $this->load->view('tamplates/header');
        $this->load->view('pages/blogedit',$res);
    }

    public function blogvalidation()
    {
        if ( empty($_FILES['photo']['name'])) {
            $this->form_validation->set_rules('photo_old', 'Photo', 'required');
           } 
           $this->form_validation->set_rules('title', 'Title', 'required');
           $this->form_validation->set_rules('discription', 'Discription', 'required');
           
           if($this->form_validation->run() === FALSE){
               $this->load->view('tamplates/header');
               $this->load->view('pages/blogedit');
               return false;   
          }else{
   
               return true;
          }
    }

    public function edit()
    {
        if($this->blogvalidation()){
            
             $photo = FALSE;
            if($_FILES['photo']['name']){
        
            $file_name = time() . $_FILES['photo']['name'] ;
			$config['upload_path']   = './assets/uploads/blog'; 
			$config['allowed_types'] = 'jpg|gif|png|jpeg|JPG|PNG'; 
			$config['max_size']      = '5242880';	
			$config['file_name']    = $file_name;  
           
            $this->load->library('upload', $config);
           
			if (!$this->upload->do_upload('photo')) {   
                print_r("hdfldfkjnsddd");
                $error = array('error' => $this->upload->display_errors()); 
                $this->load->view('tamplates/header');
				$this->load->view('pages/blog', $error); 
			}
			else { 
                $photo = $this->upload->data('file_name');
                 $file ='assets/uploads/blog/'.$this->input->post('photo_old');
						
				 unlink($file);
               
               
            }
        }   
            $id = $this->input->POST('id');
            $data =  array(
                'title'    => $this->input->post('title'),
                'discription' => $this->input->post('discription'),
            );
            
            if($photo)
            {
                $data['photo'] = $photo;
            }
            print_r($data);
            $res=$this->blog_model->update($data, $id);
            if($res){
                $this->session->set_flashdata('blogedit', 'blog update successfully!');
                redirect('pages/blogdisplay');
            }else{
                $this->session->set_flashdata('blogedit', 'blog does not update successfully!');
                redirect('pages/blogdisplay');
            }
            
        }
    }
}