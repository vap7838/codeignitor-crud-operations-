<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class delete_controller extends CI_Controller {
    public function delete()
    {
        $id = $this->input->get('id', TRUE);
        $photo=$this->user_model->read($id);
        $res=$this->user_model->delete($id);

        $file ='assets/uploads/'.$photo;
        unlink($file);

       
        if($res){
            $this->session->set_flashdata('delete', 'delete successfully!');
			redirect('pages/display');
        }else{
            $this->session->set_flashdata('delete', 'delete does not successfully!');
			redirect('pages/display');
        }
    }
}