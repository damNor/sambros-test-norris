<?php 
class Upload_model extends CI_Model
{
 
    function save_upload($title,$image)
    {
        $data = array(
                'title'     => $title,
                'file_name' => $image
            );  
        $result = $this->db->insert('document',$data);
        return $result;
    }

    function get_all()
    {
    	$query = $this->db->get('document', 10);
        return $query->result();
    }

    function get_last()
    {
    	$query = $this->db->order_by('id','desc')->limit(1)->get('document');
        return $query->result();
    }
 }   
 ?>
