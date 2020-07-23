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

    function get($entry_id,$team_id){
        $this->db->select('*');
        $this->db->from('company');
        $this->db->where('status', 1);// data active
        $this->db->where('id',$entry_id);// by id
        $query = $this->db->get();
        return $query->row_object();   
    }

    function delete($entry_id,$team_id){
        $this->db->where('id',$entry_id);
        $this->db->update('company',array('status'=>0));
    }

}
?>