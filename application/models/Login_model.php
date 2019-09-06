<?php
    class Login_model extends CI_Model
    {
        public function __construct () {
            $this->load->database();
            // $this->load->library('session');
        }

        public function admin_login ($username, $password) {
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->where('Admin_Name', $username);
            // $this->db->where('Admin_Password', $password);
            $result = $this->db->get()->row_array();
            if(password_verify($password, $result['Admin_Password'])) {
                return $result;
            } else {
               return FALSE;
            // print_r($result);
            }
        }

        public function reporter_login ($username, $password) {
            $this->db->select('*');
            $this->db->from('authors');
            $this->db->where('User_Name', $username);
            $this->db->where('User_Password', $password);
            $result = $this->db->get()->row_array();
            if($result) {
                return $result;
            } else {
               return FALSE;
            }
        }

    }