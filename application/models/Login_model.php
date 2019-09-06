<?php

class Login_model extends CI_Model 
{
    public function __construct () 
    {
        $this->load->database();
        // $this->load->library('session');
    }

    public function students_login ($stuAdmsNo, $stuPassword) 
    {
        $this->db->select('*');
        $this->db->from('ex_students');
        $this->db->where('ex_serial_no', $stuAdmsNo);
        $this->db->where('ex_password', $stuPassword);
        return $this->db->get()->row_array();
    }

    public function admin_login ($adminUserName, $adminPassword) 
    {
        $this->db->select('*');
        $this->db->from('ex_admin');
        $this->db->where('ex_admin_user', $adminUserName);
        // $this->db->where('Admin_Password', $password);
        $result = $this->db->get()->row_array();
        if($result) {
            if(password_verify($adminPassword, $result['ex_admin_password'])) {
                return $result;
            } else {
               return FALSE;
            }
        } else {
            return FALSE;
        }
    }
}