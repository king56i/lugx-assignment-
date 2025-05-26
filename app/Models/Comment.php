<?php
class Comment{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getComments(){
        $this->db->query("SELECT * FROM binhluan");
        return $this->db->pdo_query();
    }
    public function getComment($id){
        $this->db->query("SELECT * FROM binhluan WHERE id_Cmt = $id");
        return $this->db->pdo_query_one();
    }
}
?>