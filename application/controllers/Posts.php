<?php
    class Posts extends CI_Controller
    {
        private function check_session(){
            if($this->session->userdata('reporter_name')) {
    
            } else {
                $this->session->set_flashdata('login_message', 'Access denied');
                redirect('reporter');
            } 
        }
        public function view($id) {
            $data['readPost'] = $this->Post_model->get_post($id);
            // $data['locNws'] = $this->Post_model->getPostByCat('Local', 'News', 10, 0);
            
            if(empty($data['readPost'])){
                show_404();
            }

            $data['relatedNws'] = $this->Post_model->get_relatedPosts($id, 10, 1);
            $data['commentsData'] = $this->getComments($id, 15, 0);
            $this->Post_model->add_views($id);
            $data['views'] = $this->Post_model->get_views($id);
            
            $this->load->helper('date');
            $this->load->helper('text');
            $this->load->library('typography');
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }
        public function getComments($news_id, $limit, $offset) 
        {
            return $this->Post_model->getComments($news_id, $limit, $offset);   
        }

        public function comment(){
           
            $this->form_validation->set_rules('news_id', 'News ID', 'required');
            $this->form_validation->set_rules('comment_name', 'Your Name', 'required');
            $this->form_validation->set_rules('comment_email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('comment_comment', 'Comment', 'required');

            if($this->form_validation->run()){
                $news_id = $this->input->post('news_id');
                $insComment = $this->Post_model->comment();
                if($insComment){
                    $data['postComment'] = $news_id;
                    $data['commentsData'] = $this->getComments($news_id, 15, 0);
                    $this->load->helper('date');
                    $this->load->helper('text');
                    $this->load->library('typography');
                    $this->load->view('posts/comment', $data);
                } 
            }else{
                $news_id = $this->input->post('news_id');
                $data['postComment'] = $news_id;
                $data['commentsData'] = $this->getComments($news_id, 15, 0);
                $this->load->helper('date');
                $this->load->helper('text');
                $this->load->library('typography');
                $this->load->view('posts/comment', $data);
            }
            // Array ( [news_id] => 176 [coment_name] => [coment_email] => [coment_coment] => ) 
        }

        public function new_post() {
            if($this->session->userdata('reporter_name')) {
                $data['title'] = 'Create Post';

                $this->load->view('posts/create', $data);
            
            } else {
                $this->session->set_flashdata('login_message', 'Access denied');
                redirect('reporter');
            } 
        }

        public function get_category($id) {
            $query = $this->Post_model->get_category($id);
            $html = '';
            foreach ($query as $val) {
                $html .= '<option value="'.$val['id'].'">'.$val['Categories'].'</option>';
            }
            echo $html;
        }

        public function create_post () {
            if($this->session->userdata('reporter_name')) {

                $this->form_validation->set_rules('PostTitle', 'Title', 'required');
                $this->form_validation->set_rules('PostContent', 'Content', 'required');
                $this->form_validation->set_rules('PostType', 'Type', 'required');
                $this->form_validation->set_rules('PostCategory', 'Category', 'required');
                // $this->form_validation->set_rules('PostFile', 'Image', 'required');

                if($this->form_validation->run() === FALSE){
                    echo validation_errors();
                } else {
                    $fileType = $_FILES['PostFile']['type'];
                    $fileSize = $_FILES['PostFile']['size'];

                    if($fileType === 'image/jpeg' || $fileType ===  'image/png' || $fileType ===  'image/gif'){
                        if($fileSize > 1024 * 700) {
                            echo 'Image size is too big';
                        }elseif ($fileSize < 1024 * 40) {
                           echo 'Image is too small';
                        } else {
                            if($this->Post_model->create_post()){
                                $data['title'] = 'Create Post';
                                $this->load->view('posts/create', $data);
                            }
                        }
                    }else {
                        echo 'Invalid image type';
                    }  
                }             
            
            } else {
                $this->session->set_flashdata('login_message', 'Access denied');
                redirect('reporter');
            } 
    
        }

        public function view_posts ($no = NULL) {
            if($this->session->userdata('reporter_name')) {
                $data['title'] = 'All posts';
                // $this->load->library('pagination');
                $totalposts = $this->Post_model->get_noof_posts();
                $perpage = 10;

                if($no === NULL){
                    $getposts = $this->Post_model->get_posts($perpage, 0);
                }else {
                    $getposts = $this->Post_model->get_posts($perpage, $no);
                }

                // $config['base_url'] = 'http://farinwatab/posts/view_posts';
                // $config['total_rows'] = $totalposts['total'];
                // $config['per_page'] = $perpage;
                // $config['full_tag_open'] = '<div class="btn-group" role="group" aria-label="...">';
                // $config['full_tag_open'] = '</div>';
                $data['total_pages'] = ceil($totalposts['total'] / $perpage);
                $data['posts'] = $getposts;
                // $this->pagination->initialize($config);
                $this->load->view('posts/view_posts', $data);
                // print_r($this->pagination->create_links());
            } else {
                $this->session->set_flashdata('login_message', 'Access denied');
                redirect('reporter');
            } 
        }

        public function delete_post($id) {
            if($this->session->userdata('reporter_name')) {
                $del = $this->Post_model->delete_post($id);
                if($del){
                    $data['title'] = 'All posts';
                    $getposts = $this->Post_model->get_posts(10, 0);
                    $data['posts'] = $getposts;
                    $this->load->view('posts/view_posts', $data);
                } else{

                }
            } else {
                $this->session->set_flashdata('login_message', 'Access denied');
                redirect('reporter');
            } 
        }

        public function program_schedule() {

        }

        public function upload_video($id = NULL) {
            if($this->session->userdata('reporter_name')) {
                if($id === NULL) {
                    $vidTable = $this->Post_model->get_videos(10, 0);
                    $data['VidTable'] = $vidTable;
                    $this->load->view('posts/videoform', $data);
                }else {
                    $vidTable = $this->Post_model->get_videos(10, $id);
                    $data['VidTable'] = $vidTable;
                    $this->load->view('posts/videoform', $data);
                }
            } else {
                $this->session->set_flashdata('login_message', 'Access denied');
                redirect('reporter');
            } 
        }

        public function upload_video_file() {
            $post = $this->Post_model->get_numof_vid();
            $posterType = $_FILES['VideoPoster']['type'];
            $posterSize = $_FILES['VideoPoster']['size'];
            $postername = 'assets/vid/poster/poster_'.$post.'.jpg';

            $videoType = $_FILES['VideoFile']['type'];
            $videoSize = $_FILES['VideoFile']['size'];
            $videoname = 'assets/vid/uploads/video_'.$post.'.mp4';
            if($_FILES['VideoPoster']['error'] === 4) {
                if($videoType === 'video/mp4'){
                    if($videoSize > (1024 * 1024) * 100){
                        echo 'Video size is too big';
                    }else {
                        if(move_uploaded_file($_FILES["VideoFile"]["tmp_name"], $videoname)) {
                            if($this->Post_model->upload_video($postername, $videoname)) {
                                $vidTable = $this->Post_model->get_videos(10, 0);
                                $data['VidTable'] = $vidTable;
                                $this->load->view('posts/videoform', $data);
                            }   
                        }
                    }
                }else{
                    echo 'here';
                    echo 'Invalid Video file';
                }
            } else {
                if($posterType === 'image/jpeg' || $posterType ===  'image/png' || $posterType ===  'image/gif'){
                    if($videoType === 'video/mp4'){
                        if($posterSize > 1024 * 700) {
                            echo 'Image size is too big';
                        }elseif ($posterSize < 1024 * 20) {
                            echo 'Image is too small';
                        } else {
                            if($videoSize > (1024 * 1024) * 100){
                                echo 'Video size is too big';
                            }else {
                                if(move_uploaded_file($_FILES["VideoPoster"]["tmp_name"], $postername) 
                                & move_uploaded_file($_FILES["VideoFile"]["tmp_name"], $videoname)) {
                                    if($this->Post_model->upload_video($postername, $videoname)) {
                                        $vidTable = $this->Post_model->get_videos(10, 0);
                                        $data['VidTable'] = $vidTable;
                                        $this->load->view('posts/videoform', $data);
                                    }   
                                }
                            }
                        }
                    }else{
                        echo 'Invalid Video file';
                    }
                }else {
                    echo 'Invalid image file';
                }  
            }
        } 

        public function delete_video($id) {
            if($this->session->userdata('reporter_name')) {
                if($this->Post_model->delete_video($id)) {
                    $vidTable = $this->Post_model->get_videos(10, 0);
                    $data['VidTable'] = $vidTable;
                    $this->load->view('posts/videoform', $data);
                }
            } else {
                $this->session->set_flashdata('login_message', 'Access denied');
                redirect('reporter');
            } 
        }

        public function next_post() {
            $this->load->helper('text');
            // nws next
            if(isset($_POST['newsNext'])) {
                $next = $_POST['newsNext'];
                $prev = $_POST['newsPrevv'];
                $no = $next + $prev;
                $exData['curNext'] = $next;
                $exData['curPrev'] = $no;
                $data = $this->Page_model->getPostByCat('Local', 'News', $next, $prev);
                if(sizeof($data) >= $next) {
                    $exData['newsNext'] = $data;
                    $this->load->view('posts/more', $exData);
                }else{exit();}
            }
            // int next
            if(isset($_POST['intNext'])) {
                $next = $_POST['intNext'];
                $prev = $_POST['intPrevv'];
                $no = $next + $prev;
                $exData['curNext'] = $next;
                $exData['curPrev'] = $no;
                $data = $this->Page_model->getPostByCat('International', 'News', $next, $prev);
                if(sizeof($data) >= $next) {
                    $exData['intNext'] = $data;
                    $this->load->view('posts/more', $exData);
                }else{exit();}
            }
            // pol next
            if(isset($_POST['polNext'])) {
                $next = $_POST['polNext'];
                $prev = $_POST['polPrevv'];
                $no = $next + $prev;
                $exData['curNext'] = $next;
                $exData['curPrev'] = $no;
                $data = $this->Page_model->getPostByCat('Local', 'Politics', $next, $prev);
                if(sizeof($data) >= $next) {
                    $exData['polNext'] = $data;
                    $this->load->view('posts/more', $exData);
                }else{exit();}
            }
            // bus next
            if(isset($_POST['busNext'])) {
                $next = $_POST['busNext'];
                $prev = $_POST['busPrevv'];
                $no = $next + $prev;
                $exData['curNext'] = $next;
                $exData['curPrev'] = $no;
                $data = $this->Page_model->getPostByCat('Local', 'Business', $next, $prev);
                if(sizeof($data) >= $next) {
                    $exData['busNext'] = $data;
                    $this->load->view('posts/more', $exData);
                }else{exit();}
            }
        }

        public function prev_post() {
            $this->load->helper('text');
            // nws prev
            if(isset($_POST['newsPrev'])) {
                $next = $_POST['newsNextt'];
                $prev = $_POST['newsPrev'];
                $no = $prev - $next;
                if($no >= 0) {
                    $exData['curNext'] = $next;
                    $exData['curPrev'] = $no;
                    $data = $this->Page_model->getPostByCat('Local', 'News', $next, $no);
                    if(sizeof($data) >= $next) {
                        $exData['newsNext'] = $data;
                        $this->load->view('posts/more', $exData);
                    }else{}
                }else{exit();}
            }
            // int prev
            if(isset($_POST['intPrev'])) {
                $next = $_POST['intNextt'];
                $prev = $_POST['intPrev'];
                $no = $prev - $next;
                if($no >= 0) {
                    $exData['curNext'] = $next;
                    $exData['curPrev'] = $no;
                    $data = $this->Page_model->getPostByCat('International', 'News', $next, $no);
                    if(sizeof($data) >= $next) {
                        $exData['intNext'] = $data;
                        $this->load->view('posts/more', $exData);
                    }else{}
                }else{}
            }
            // pol prev
            if(isset($_POST['polPrev'])) {
                $next = $_POST['polNextt'];
                $prev = $_POST['polPrev'];
                $no = $prev - $next;
                if($no >= 0) {
                    $exData['curNext'] = $next;
                    $exData['curPrev'] = $no;
                    $data = $this->Page_model->getPostByCat('Local', 'Politics', $next, $no);
                    if(sizeof($data) >= $next) {
                        $exData['polNext'] = $data;
                        $this->load->view('posts/more', $exData);
                    }else{}
                }else{}
            }
            // bus prev
            if(isset($_POST['busPrev'])) {
                $next = $_POST['busNextt'];
                $prev = $_POST['busPrev'];
                $no = $prev - $next;
                if($no >= 0) {
                    $exData['curNext'] = $next;
                    $exData['curPrev'] = $no;
                    $data = $this->Page_model->getPostByCat('Local', 'Business', $next, $no);
                    if(sizeof($data) >= $next) {
                        $exData['busNext'] = $data;
                        $this->load->view('posts/more', $exData);
                    }else{}
                }else{}
            }
        }
    }

    // $posterType = $_FILES['VideoPoster']['type'];
    // $posterSize = $_FILES['VideoPoster']['size'];

    // $videoType = $_FILES['VideoFile']['type'];
    // $videoSize = $_FILES['VideoFile']['size'];
    
    // $configVideo['upload_path'] = 'assets/vid/uploads';
    // $configVideo['max_size'] = '102400';
    // $configVideo['allowed_types'] = 'mp4';
    // $configVideo['overwrite'] = FALSE;
    // $configVideo['remove_spaces'] = TRUE;
    // $video_name = random_string('numeric', 5);
    // $configVideo['file_name'] = $video_name;

    // $this->load->library('upload', $configVideo);
    // $this->upload->initialize($configVideo);

    // if (!$this->upload->do_upload('uploadan'))
    // {
    //     $this->session->set_flashdata('error');
    // }
    // else
    // {
    //     $url = 'assets/gallery/images'.$video_name;
    //     $set1 =  $this->Model_name->uploadData($url);
    //     $this->session->set_flashdata('success', 'Video Has been Uploaded');
    //     redirect('controllerName/method');
    // }