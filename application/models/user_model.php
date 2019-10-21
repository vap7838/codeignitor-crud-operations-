<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user_model extends CI_Model
{
    public function insert($photo){
            // user data array
            $data =  array(
                'fname' => $this->input->post('fname'),
                'lname'    => $this->input->post('lname'),
                'birthday'    => $this->input->post('birthday'),
                'gender'    => $this->input->post('gender'),
                 'photo'    =>$photo,
                'email'    => $this->input->post('email'),
                'password'    =>$this->input->post('password')
            );
       // insert user data 
       return $this->db->insert('user',$data);
    
    
     }
     
     public function login($email,$password){
        $array = array('email' => $email, 'password' => $password);
        
		$res = $this->db->where($array);
        $res = $this->db->get('user');
    
        if($res->num_rows()==1){
             return $res->row(0)->id;
          
        }
    }

    public function show(){

        $res = $this->db->get('user');
        return $res->result_array();
    }

    public function edit($id){
        $res = $this->db->get_where('user', array('id' => $id));
        return $res->result_array();
    } 

    public function update($id,$data){
       
    
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }
    
    public function delete($id)
    {
        return $this->db->delete('user', array('id' => $id));
    }

    public function read($id)
    {
        $res = $this->db->get_where('user', array('id' => $id));
        $res = $res->result_array();
        foreach($res as $row){
            return $row['photo'];
        }
    }

}