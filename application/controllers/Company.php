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
		$data['base_url'] = base_url('company');
		$data['company_data'] = $this->company_model->get();
		$data['pic_data'] = $this->pic_model->dropdown();
		// echo "<pre>",print_r($data['company_data']),"</pre>";
		$this->load->view('company/index',$data);
	}

	public function restore()
	{
		$this->load->helper('url');
		$data['base_url'] = base_url('company');
		$data['company_data'] = $this->company_model->get(0);
		$data['pic_data'] = $this->pic_model->dropdown();
		// echo "<pre>",print_r($data['company_data']),"</pre>";
		$this->load->view('company/trash',$data);
	}

	public function create()
	{
		   $data = array(
                      'name'          	=> strtoupper($this->input->post('name')),
                      'phone'        	=>  $this->input->post('phone'),
                      'address'         => $this->input->post('address'),
                      'logo'          	=> (isset( $this->upload_data['logo']['file_name']) ? $this->upload_data['logo']['file_name'] : ''),
                      'pic'          	=> $this->input->post('pic'),
                );
        // echo "<br /> <pre>",print_r($data),"</pre>";
		if($this->company_model->check_pic($this->input->post('pic')))
		{
			if($this->company_model->insert($data))
			echo json_encode(array('result' => 'success', 'message' => 'Insert success'));
			else
				echo json_encode(array('result' => 'failed', 'message' => 'Insert Failed'));	
		}
		else
			echo json_encode(array('result' => 'failed','message' => 'PIC already more than 3 Company'));	

		
	}

	public function delete()
	{
		$entry_id = $this->input->post('entry_id');
		$this->company_model->delete($entry_id);
		echo json_encode(array('result' => 'success'));
	}

	public function restore_data()
	{
		$entry_id = $this->input->post('entry_id');
		$this->company_model->update(array('status'=> 1),$entry_id);
		echo json_encode(array('result' => 'success'));
	}
}
?>