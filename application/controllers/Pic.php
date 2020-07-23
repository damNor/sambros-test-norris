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
		$data['pic_data'] = $this->pic_model->get();
		$this->load->view('pic/index',$data);
	}

	public function create()
	{
		   $data = array(
                      'name'           => strtoupper($this->input->post('name')),
                      'phone'        =>  $this->input->post('phone'),
                      'email'          => $this->input->post('email'),
                      'address'          => $this->input->post('address'),
                );
        echo "<br /> <pre>",print_r($data),"</pre>";
        $this->pic_model->insert($data);
	}
 
	 
}
?>