<?php
class Page_model extends CI_Model
{
    public function __construct() {
        $this->load->database();
    }

    public function get_posts($slug = NULL) {
        if($slug === NULL) {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        $query = $this->db->get_where('news', ['id' => $slug]);
        return $this->row_array();
    }

    public function getPostByCat($type, $cat, $limit, $offset){
        $this->db->select('`News_Title`, `Description`, `News_Type`, `Categories`,
        `Station_Name`, `Created_At`, `Img_Url`, Nws.id');
        $this->db->from('news_type AS Ntp');
        $this->db->join('category AS Cat', 'Ntp.id=Cat.News_Type_id');
        $this->db->join('news AS Nws', 'Nws.Category_News_Type_id = Ntp.id AND Nws.Category_id = Cat.id');
        $this->db->join('authors AS Aut', 'Aut.id = Nws.Authors_id');
        $this->db->join('stations AS Stn', 'Stn.id = Aut.Stations_id');
        $this->db->where('Ntp.News_Type', $type);
        $this->db->where('Cat.Categories', $cat);
        $this->db->limit($limit, $offset);
        $this->db->order_by('Nws.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getStations(){
        $this->db->select('*');
        $this->db->from('stations');
        $this->db->order_by('Station_Name');
        return $this->db->get()->result_array();
    }

    public function getVideos($limit, $offset) {
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->limit($limit, $offset);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }

    // $nws = $this->getRows("SELECT `News_Title`, `Description`, `News_Type`, `Categories`,
    //     `Station_Name`, `Created_At`, `Img_Url`, Nws.id FROM `news_type` AS Ntp
    //     INNER JOIN category AS Cat ON Ntp.News_Type = ? AND Cat.Categories = ?
    //     INNER JOIN news AS Nws ON Nws.Category_News_Type_id = Ntp.id AND Nws.Category_id = Cat.id
    //     INNER JOIN authors as Aut ON Aut.id = Nws.Authors_id
    //     INNER JOIN stations as Stn ON Stn.id = Aut.Stations_id ORDER BY Nws.id DESC LIMIT $from, $lmtno;", [$typ, $cat]);
    //     return $nws;


}
