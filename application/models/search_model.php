<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class search_model extends CI_Model{
    function getSearch($blog) {
        if(empty($blog))
           return array();
    
        $result = $this->db->like('title', $blog)
                 ->or_like('discription	', $blog)
                 ->get('userblog');
    
        return $result->result_array();
    }
}