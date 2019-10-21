<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class search_controller extends CI_Controller {
    function searchblogs() {
        $blog = $this->input->post('search');
        $postlist['searchblog'] = $this->search_model->getSearch($blog);
        $this->load->view('tamplates/header');
        $this->load->view('pages/search', $postlist);
    }
}