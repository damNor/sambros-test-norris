 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller 
{
	public function __construct() {
       parent::__construct();	
       $this->load->model('upload_model');
    }

	public function __construct() {
       parent::__construct();	
    }

	public function index()
	{
		$this->load->helper('url');
		$data['base_url'] = base_url('upload');
		$this->load->view('index',$data);
	}
}
?>