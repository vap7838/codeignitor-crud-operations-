<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class blog_model extends CI_Model{
    
    public function insert($data)
    {
        return $this->db->insert('userblog',$data);
    }

    public function show($user_id){
        $this->db->where('user_id',$user_id);
        $res = $this->db->get('userblog');
        return $res->result_array();
    }

    public function edit($id)
    {
        $this->db->where('id',$id);
        $res = $this->db->get('userblog');
        return $res->result_array(); 
    }

    public function update($data,$id){
        // $title = $this->input->post('title');
        // $discription = $this->input->post('discription');

        // $res = $this->db->query("UPDATE userblog SET title='$title',discription='$discription' WHERE id='$id'"); 
        // $this->db->set($data);
         $this->db->where('id', $id);
         return $this->db->update('userblog',$data);
    }

    public function read($id)
    {
        $res = $this->db->get_where('userblog', array('id' => $id));
        $res = $res->result_array();
        foreach($res as $row){
            return $row['photo'];
        }
    }

    public function delete($id)
    {
        return $this->db->delete('userblog', array('id' => $id));
    }

    public function showAll() {
        $res = $this->db->get('userblog');
        return $res->result_array();
    }


}