<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Model
{
    function is_logged_in()
    {
        return $this->session->userdata('user_id');
    }

    function is_role()
    {
        return $this->session->userdata('role');
    }

    function check_login($field1, $field2)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where('username', $field1);
        $this->db->where('password', $field2);
        return $this->db->get()->row();
    }
}
