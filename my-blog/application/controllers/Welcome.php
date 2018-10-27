<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		
		$this->load->model('Blog_model');

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

	public function check_email(){
		$email = $this->input->get('email');
		$this->load->model('User_model');
		$rows = $this->User_model->get_user_by_email($email);

		if(count($rows) >0){
			echo 'fail';
		}else{
			echo 'success';
		}
	}

}
