<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
        $this->load->helper('url_helper');
    }
    
    public function get_table_data($table, $select, $where=null,$array=false) {
        $sql = "SELECT * FROM ".$table;
        if(is_array($select)) {
            $sql = "SELECT ".implode(', ', $select)." FROM ".$table;
        }
        if($where != null) {
            $sql .= " WHERE ".implode(' AND ', $where);
        }        
        
        $rows = $this->db->query($sql);
        if($rows->num_rows() <= 1 && $array==false) {
            $query = $this->db->query($sql);
            return $query->row_array();
        }
        else {
            $query = $this->db->query($sql);
            return $query->result_array();
        }
    }
    
    public function insert_data($table, $data) {
        $this->db->insert($table,$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    public function edit_data($table, $data, $id) {
        if($this->db->update($table, $data, $id))
            return true;
        else
            die($this->db->error());         
    }
    public function delete_data($table, $id) {
        
        if($this->db->delete($table, $id))
            return true;
        else
            return false;
    }

    public function insert_batch_data($table, $data) {
        $this->db->insert_batch($table,$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }
    
}