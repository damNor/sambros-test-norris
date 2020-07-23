<?php
class pic_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function insert($data){

        if($this->db->insert('pic',$data)){
            return true;
        }else{
            return false;
        }
    }

    function update($data,$entry_id){
        $this->db->where('id',$entry_id);
        $this->db->update('pic',$data);
        return ($this->db->affected_rows() > 0 ) ? TRUE : FALSE;
    }

    function get($entry_id,$team_id){
        $this->db->select('*');
        $this->db->from('pic');
        $this->db->where('status', 1);// data active
        $query = $this->db->get();
        return $query->row_object();   
    }

    function dropdown(){
        $this->db->select('id,name');
        $this->db->from('pic');
        $this->db->where('status', 1);// data active
        $query = $this->db->get();
        return $query->result_array();   
    }

    function delete($entry_id,$team_id){
        $this->db->where('id',$entry_id);
        $this->db->update('pic',array('status'=>0));
    }

}
?>