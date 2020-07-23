<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pic extends CI_Controller 
{
	public function __construct() {
       parent::__construct();	
        $this->load->model('pic_model');
    }

	public function index()
	{
		$this->load->helper('url');
		$data['base_url'] = base_url('upload');
		$this->load->view('company/index',$data);
	}

 
	 
}
?>