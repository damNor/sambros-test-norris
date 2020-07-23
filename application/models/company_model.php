<?php
class company_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function insert($data){

        if($this->db->insert('company',$data)){
            return true;
        }else{
            return false;
        }
    }

    function update($data,$entry_id){
        $this->db->where('id',$entry_id);
        $this->db->update('company',$data);
        return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
    }

    function get(){
        $this->db->select('company.id, company.name,company.phone,pic.name as pic_name,company.address,company.logo');
        $this->db->from('company');
        $this->db->join('pic','company.pic = pic.id');
        $this->db->where('company.status', 1);// data active
        $query = $this->db->get();
        return $query->result_array();   
    }

    function delete($entry_id){
        $this->db->where('id',$entry_id);
        $this->db->update('company',array('status'=>0));
    }

}
?>