<?php
    class Manage_model extends CI_Model
    {
        public function __construct() {
            $this->load->database();
        }

        public function create_new_user ($formData) {
            
            if($this->db->insert('authors', $formData)){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function addNewStation($formData)
        {
          $this->db->insert('stations', $formData);
        }

        public function getStations() {
            $this->db->select('*');
            $this->db->from('stations');
            return $this->db->get()->result_array();
        }

        public function view_users () {
            $this->db->select('aut.id, User_Name, User_Password, Station_Name');
            $this->db->from('authors AS aut');
            $this->db->join('stations AS stn', 'aut.Stations_id = stn.id');
            return $this->db->get()->result_array();
        }

        public function delete_user ($id) {
            $this->db->where('id', $id);
            if($this->db->delete('authors')){
                return TRUE;
            }else{
                return FALSE;
            }
        }

        public function add_category ($type, $cat) {

            $ins = $this->db->insert('category', ['Categories' => $cat, 'News_Type_id' => $type]);

            if($ins) {
                return TRUE;
            } else {
                return FALSE;
            }

        }

        public function delete_category ($id) {
            $this->db->where('id', $id);
            if($this->db->delete('category')){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }
