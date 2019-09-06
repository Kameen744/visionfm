<?php
class Post_model extends CI_Model
{
    public function __construct() {
        $this->load->database();
    }

    public function get_post($id = NULL){
        if($id === NULL) {
           return;
        }

        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    public function get_posts($limit, $offset) 
    {
        $this->db->select('id, News_Title, Created_At');
        $this->db->from('news');
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_relatedPosts($id = NULL, $limit, $offset)
    {
        if($id === NULL) {
           return;
        }

        $this->db->select('Nws.News_Title, Nws.Category_id, cat.Categories, Nws.Img_Url, Nws.id');
        $this->db->from('news AS NewsRef');
        $this->db->join('news AS Nws', 'NewsRef.Category_id=Nws.Category_id');
        $this->db->join('category AS cat', 'cat.id=Nws.Category_id');
        $this->db->where('NewsRef.id', $id);
        $this->db->limit($limit, $offset);
        $this->db->order_by('Nws.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_noof_posts() 
    {
        $this->db->select('COUNT("id") AS total');
        $this->db->from('news');

        return $this->db->get()->row_array();
    }

    public function get_category($id) 
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('News_Type_id', $id);
        return $this->db->get()->result_array();
    }

    public function Resize_image($width, $height,  $filename_in, $filename_out)
    {
        $configI['image_library'] = 'gd2';
        $configI['source_image']    = $filename_in;
        $configI['create_thumb'] = FALSE;
        $configI['maintain_ratio'] = FALSE;
        $configI['width']    = $width;
        $configI['height']  = $height;
        $configI['new_image'] = $filename_out;    
        $this->load->library('image_lib', $configI);

        $this->image_lib->initialize($configI);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }

    public function create_post() 
    {
        $this->db->select_max('id');
        $result= $this->db->get('news')->row_array();
        $recs = $result['id'];
        if(is_numeric($recs)){
            $num = ($recs) +1;
        }else {
            $num = rand(101, 999);
        }
        $post = 'post_' .$num .'_' .rand(101, 999);
 
        $savurl = './assets/img/uploads/'.$post;
        $fileName = $_FILES['PostFile']['tmp_name'];
        $fileType = $_FILES['PostFile']['type'];

        $data = [
            'News_Title' => $this->input->post('PostTitle'),
            'Description' => $this->input->post('PostContent'),
            'Img_url' => $post,
            'Authors_id' => 1,
            'Category_id' => $this->input->post('PostCategory'),
            'Category_News_Type_id' => $this->input->post('PostType'),
            'reportlink' => $this->input->post('reportlink'),
            // $PostFile => $this->input->post('PostFile')
        ];
        
        if($this->db->insert('news', $data)) {
            $this->Resize_image(600, 345, $fileName, $savurl .'lg.jpg');
            $this->Resize_image(400, 228, $fileName, $savurl .'md.jpg');
            $this->Resize_image(200, 114, $fileName, $savurl .'sm.jpg');
            return TRUE;
        }else {
            return FALSE;
        }

    }

    public function getComments($news_id, $limit, $offset)
    {
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->where('news_id', $news_id);
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function comment() 
    {
        if($this->db->insert('comments', $this->input->post())){
            return TRUE;
        }
    }

    public function add_views($id)
    {
        $this->db->insert('post_views', ['news_id' => $id, 'view' => 1]);
    }

    public function get_views($id)
    {
        $this->db->select('SUM(`view`) AS tviews');
        $this->db->from('post_views');
        $this->db->where('news_id', $id);
     
        $views = $this->db->get()->result_array();

        return $views[0]['tviews'];
      
    }

    public function get_numof_vid () 
    {
        $this->db->select('COUNT(id)  AS Total');
        $this->db->from('videos');
        $total = $this->db->get()->row_array();
        return $total['Total'];
    }

    public function get_videos($limit, $offset) 
    {
        $this->db->select('id, Video_Title, File_Url, Poster_Url');
        $this->db->from('videos');
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function upload_video($postername, $videoname) 
    {
        $data = [
            'Video_Title' => $_POST['VideoTitle'],
            'File_Url' => $videoname,
            'Poster_Url' => $postername
        ];

        if($this->db->insert('videos', $data)){
            return TRUE;
        }
    }

    public function delete_video($id) 
    {
        $this->db->where('id', $id);
        if($this->db->delete('videos')){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete_post($id)
    {
    
        $query = $this->db->get_where('news', array('id' => $id));
        $img = $query->row_array();

        $this->db->where('id', $id);

        if($this->db->delete('news')){
           unlink('./assets/img/uploads/'.$img['Img_Url'] .'lg.jpg');
           unlink('./assets/img/uploads/'.$img['Img_Url'] .'md.jpg');
           unlink('./assets/img/uploads/'.$img['Img_Url'] .'sm.jpg');
            return TRUE;
        }else{
            return FALSE;
        }
        
    }

}




