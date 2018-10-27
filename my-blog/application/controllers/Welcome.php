<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->model('User_model');
    }
    public function index()
	{
		$blog_list = $this->Blog_model->get_blog_list();
		$catalog_list = $this->Blog_model->get_catalog_list();
		$this->load->view('index',array(
			'list'=>$blog_list,
			'catalog_list'=>$catalog_list
		));
	}
	public function reg(){
		$this->load->view('reg');
	}
    public function login(){
        $this->load->view('login');
    }
	public function check_email(){
		$email = $this->input->get('email');
		$rows = $this->User_model->get_user_by_email($email);
		if(count($rows) >0){
			echo 'fail';
		}else{
			echo 'success';
		}
	}
	public function save(){
        $name=$this->input->get('name');
        $pwd=$this->input->get('pwd');
        $email=$this->input->get('email');
        $sex=$this->input->get('sex');
        $code=$this->input->get('code');
        if ($name==''){
            echo 'name_error';
        }elseif ($pwd==''){
            echo  'pwd_error';
        }elseif ($email==''){
            echo  'email_error';
        }elseif ($sex==''){
            echo  'sex_error';
        }elseif ($code==''){
            echo  'code_error';
        }else{
            $this->load->model('User_model');
            $result=$this->User_model->save($name,$pwd,$email,$sex);
            if ($result > 0){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
    }

}
