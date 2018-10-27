<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/20
 * Time: 15:26
 */
class User_model extends CI_Model{
    public function save($name,$pwd1){
        $data=array(
            'name'=>$name,
            'password'=>$pwd1
        );
        $query=$this->db->insert('t_user',$data);
        return $query;
    }
    public function get_user_by_name_and_pwd($name,$pwd1){
        $query=$this->db->get_where('t_user', array(
            'name'=>$name,
            'password'=>$pwd1
        ));
        return $query->row();

    }

}