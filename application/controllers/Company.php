 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller 
{
	public function __construct() {
       parent::__construct();	
       $this->load->model(array('company_model','pic_model'));
    }

	public function index()
	{
		$this->load->helper('url');
		$data['base_url'] = base_url('upload');
		$data['company_data'] = $this->company_model->get();
		$data['pic_data'] = $this->pic_model->dropdown();
		// echo "<pre>",print_r($data['company_data']),"</pre>";
		$this->load->view('company/index',$data);
	}

	public function create()
	{
		   $data = array(
                      'name'           => strtoupper($this->input->post('name')),
                      'phone'        =>  $this->input->post('phone'),
                      'address'          => $this->input->post('address'),
                       'logo'          => (isset( $this->upload_data['logo']['file_name']) ? $this->upload_data['logo']['file_name'] : ''),
                      'pic'          => $this->input->post('pic'),
                );
        echo "<br /> <pre>",print_r($data),"</pre>";
        $this->company_model->insert($data);
	}
}
?>