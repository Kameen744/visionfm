<?php
    class Admin extends CI_Controller
    {
        public function index ()
        {
            $data['title'] = 'Admin Login';
            $this->load->view('templates/userheader');
            $this->load->view('admin/index', $data);
            $this->load->view('templates/userfooter');
        }

        private function CheckSession()
        {
          if($this->session->userdata('admin_name')) {
            return true;
          }else {
            $this->session->set_flashdata('login_message', 'Access denied');
            redirect('admin');
          }
        }

        public function login()
        {
            $this->form_validation->set_rules('UserName', 'User Name', 'required');
            $this->form_validation->set_rules('UserPassword', 'Password', 'required');

            if($this->form_validation->run() === FALSE) {
                $data['title'] = 'Admin Login';

                $this->load->view('templates/userheader');
                $this->load->view('admin/index', $data);
                $this->load->view('templates/userfooter');
            } else {
                $username = $this->input->post('UserName');
                $password = $this->input->post('UserPassword');
                $get_user = $this->Login_model->admin_login($username, $password);

                if($get_user) {
                    $userdata = [
                        'user_id' => $get_user['id'],
                        'admin_name' => $get_user['Admin_Name']
                    ];
                    $this->session->set_userdata($userdata);
                   redirect('admin/dashboard');
                } else {
                   $this->session->set_flashdata('login_message', 'Wrong Username or Password');
                   redirect('admin');
                }

                // print_r($get_user);

            }
        }

        public function dashboard()
        {
            $this::CheckSession();
            // redirect('admin/admin_area');
            $this->load->view('templates/userheader');
            $this->load->view('admin/admin_area');
            $this->load->view('templates/userfooter');
                // $this::CheckSession();
                // $this->load->view('templates/userheader');
                // $this->load->view('admin/admin_area');
                // $this->load->view('templates/userfooter');
        }
        // add new station

        public function addNewStation()
        {
          $this::CheckSession();
          $this->form_validation->set_rules('StationName', 'Station Name', 'required');
          $this->form_validation->set_rules('StationFrequency', 'Station Frequency', 'required|min_length[4]');

          if($this->form_validation->run()) {
            $formData = ['Station_Name' => $this->input->post('StationName'), 'Frequency' => $this->input->post('StationFrequency')];
            $this->Manage_model->addNewStation($formData);
          } else {
            $this->new_user();
          }
        }

        public function new_user ()
        {
            $this::CheckSession();
                $data['stationsArr'] = $this->Manage_model->getStations();
                $data['usersArr'] = $this->Manage_model->view_users();

                $this->load->view('admin/new_user', $data);
        }

        public function create_new_user ()
        {
            $this::CheckSession();
                if(!empty($_POST['AddUserName']) & !empty($_POST['AddUserPassword'])){
                    if($this->Manage_model->create_new_user($_POST['AddUserName'], $_POST['AddUserPassword'])){
                        echo 'Successefully registered';
                    }else{
                        echo 'Failed to add new user';
                    }
                }else{
                    echo 'All fields required';
                }
        }

        public function view_users ()
        {
            $this::CheckSession();
                $get = $this->Manage_model->view_users();
                $this->load->view('admin/view_users', ['users' => $get]);
        }

        public function delete_user ($id)
        {
            $this::CheckSession();
                if($this->Manage_model->delete_user($id)) {
                    $get = $this->Manage_model->view_users();
                    $this->load->view('admin/view_users', ['users' => $get]);
                }else{
                    echo 'Failed to delete user '.$id;
                }
        }

        public function manage_categories ($id = NULL)
        {
            $this::CheckSession();
                if($id === NULL) {
                    $this->load->view('admin/manage_categories');
                }else {
                    $get = $this->Post_model->get_category($id);
                    $this->load->view('admin/manage_categories', ['categories' => $get]);
                }
        }

        public function add_category()
        {
            $this::CheckSession();
                if(isset($_POST['catType']) & isset($_POST['catText'])){
                    $cattype = $_POST['catType'];
                    $cattext = $_POST['catText'];
                    $ins = $this->Manage_model->add_category($cattype, $cattext);
                    if($ins) {
                        $get = $this->Post_model->get_category($cattype);
                        $this->load->view('admin/manage_categories', ['categories' => $get]);
                    }
                }
        }

        public function delete_category()
        {
            $this::CheckSession();
                if(isset($_POST['delCatTypeId']) & isset($_POST['delCatId'])){
                    $delCatTypeId = $_POST['delCatTypeId'];
                    $delCatId = $_POST['delCatId'];
                    $ins = $this->Manage_model->delete_category($delCatId);
                    if($ins) {
                        $get = $this->Post_model->get_category($delCatTypeId);
                        $this->load->view('admin/manage_categories', ['categories' => $get]);
                    }
                }
        }

        public function viewPosts()
        {
            echo 'view posts';
        }

        public function logout()
        {
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('admin_name');
            redirect('admin');
        }

    }
