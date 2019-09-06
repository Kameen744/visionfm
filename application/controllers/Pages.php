<?php
    class Pages extends CI_Controller
    {
        public function view($page = 'home') {
            if(!file_exists(APPPATH .'views/pages/' .$page .'.php')) {
                show_404();
            }

            $lmt = ['lcnwslmt' => 10, 'lcpollmt' => 6, 'lcbuslmt' => 1, 'lchltlmt' => 1,
            'lcentlmt' => 3, 'lcsprlmt' => 2, 'intnwslmt' => 10, 'intsprlmt' => 2];

            $data['lmt'] = $lmt;

            $data['title'] = ucfirst($page);

            $data['locNws'] = $this->Page_model->getPostByCat('Local', 'News', $lmt['lcnwslmt'], 0);
            $data['locPol'] = $this->Page_model->getPostByCat('Local', 'Politics', $lmt['lcpollmt'], 0);
            $data['locBus'] = $this->Page_model->getPostByCat('Local', 'Business', $lmt['lcbuslmt'], 0);
            $data['locHlth'] = $this->Page_model->getPostByCat('Local', 'Health', $lmt['lchltlmt'], 0);
            $data['locEnt'] = $this->Page_model->getPostByCat('Local', 'Entertainment', $lmt['lcentlmt'], 0);
            $data['locSprt'] = $this->Page_model->getPostByCat('Local', 'Sport', $lmt['lcsprlmt'], 0);
            $data['intNws'] = $this->Page_model->getPostByCat('International', 'News', $lmt['intnwslmt'], 0);
            $data['intSpt'] = $this->Page_model->getPostByCat('International', 'Sport', $lmt['intsprlmt'], 0);
            $data['stations'] = $this->Page_model->getStations();
            $data['Videos'] = $this->Page_model->getVideos(10, 0);

            $data['posts'] = $this->Page_model->get_posts();
            $this->load->helper('text');
            $this->load->view('templates/header', $data);
            $this->load->view('pages/' .$page);
            $this->load->view('templates/footer');
            // print_r($data['locNws']);
        }

        public function view_slug($type = null, $slug = null) {
            if($type === 'foreign'){
                $type = 'international';
            }
            
            $data['locNws'] = $this->Page_model->getPostByCat(ucfirst($type), ucfirst($slug), 10, 0);
            $data['stations'] = $this->Page_model->getStations();
            
            $this->load->helper('text');
            $this->load->view('templates/header', $data);
            $this->load->view('pages/slug');
            $this->load->view('templates/footer');
        }
    }

    // $db = new Get_Rec();
    // $locNws = $db->getPosts('Local', 'News', 0, 10);
    // $locPol = $db->getPosts('Local', 'Politics', 0, 10);
    // $locBus = $db->getPosts('Local', 'Business', 0, 10);
    // $locHlth = $db->getPosts('Local', 'Health', 0, 10);
    // $locSprt = $db->getPosts('Local', 'Sport', 0, 10);
    // $intNws = $db->getPosts('International', 'News', 0, 10);
    // $intSpt = $db->getPosts('International', 'Sport', 0, 10);

    // function G_img($img, $size) {
    //    return  'img/uploads/'.$img .$size.'.jpg';
    // }
