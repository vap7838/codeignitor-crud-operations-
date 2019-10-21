<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class index_controller extends CI_Controller {

	
	public function index()
	{
        $this->load->view('tamplates/header');
		$this->load->view('pages/index');
	}
}
