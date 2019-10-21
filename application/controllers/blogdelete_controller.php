<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blogdelete_controller extends CI_Controller 
{
    public function delete()
    {
        $id = $this->input->get('id', TRUE);
        $photo=$this->blog_model->read($id);
       
       
       
        $res=$this->blog_model->delete($id);

        $file ='assets/uploads/blog/'.$photo;
        
        unlink($file);
       

       
        if($res){
            $this->session->set_flashdata('blogdelete', 'delete successfully!');
			redirect('pages/blogdisplay');
        }else{
            $this->session->set_flashdata('blogdelete', 'delete does not successfully!');
			redirect('pages/blogdisplay');
        }
    }
}