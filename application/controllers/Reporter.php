<?php 
    class Reporter extends CI_Controller 
    {
        public function index () {
            $data['title'] = 'Reporter Login';
            $this->load->view('templates/userheader');
            $this->load->view('reporter/index', $data);
            $this->load->view('templates/userfooter');
        }

        public function login() {
            $this->form_validation->set_rules('UserName', 'User Name', 'required');
            $this->form_validation->set_rules('UserPassword', 'Password', 'required');
            
            if($this->form_validation->run() === FALSE) {
                $data['title'] = 'Reporter Login';
              
                $this->load->view('templates/userheader');
                $this->load->view('reporter/index', $data);
                $this->load->view('templates/userfooter');
            } else {
                $username = $this->input->post('UserName');
                $password = $this->input->post('UserPassword');
                
                $get_user = $this->Login_model->reporter_login($username, $password);
               
                if($get_user) {
                    $userdata = [
                        'reporter_id' => $get_user['id'],
                        'station_id' => $get_user['Stations_id'],
                        'reporter_name' => $get_user['User_Name']
                    ];
                    $this->session->set_userdata($userdata);
                    redirect('reporter/dashboard');
                } else {
                   $this->session->set_flashdata('login_message', 'Wrong Username or Password');
                   redirect('reporter');
                }
            }
        }

        public function dashboard () {
            if($this->session->userdata('reporter_name')) {
                
                $this->load->view('templates/userheader');
                $this->load->view('reporter/dashboard');
                $this->load->view('templates/userfooter');
                
            } else {
                $this->session->set_flashdata('login_message', 'Access denied');
                redirect('reporter');
            }
        }

        public function logout() {
            $this->session->unset_userdata('reporter_id');
            $this->session->unset_userdata('station_id');
            $this->session->unset_userdata('reporter_name');
            redirect('reporter');
        }
    }