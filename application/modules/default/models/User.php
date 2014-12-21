<?php
class Model_User extends Zend_Db_Table_Abstract{
    protected $_name="user";
    protected $_primary="id";

    protected $db;
    public function __construct(){
        $this->db=Zend_Registry::get('db');
    }


    public function getLoginUserInfo($username){ 
        $sql=$this->db->query("select id, password from user where username='".$username."'");
        return $sql->fetchAll();
    }

    public function listall(){ 
        $sql=$this->db->query("select * from user where level='1' order by id DESC");
        return $sql->fetchAll();
    }
    public function listall2(){
        $query=$this->select();
        $query->where('level =?','2');
        return $this->fetchAll($query);
    }
}