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
        $captcha=$this->session->userdata('captcha');
        if ($name==''){
            echo 'name_error';
        }elseif ($pwd==''){
            echo  'pwd_error';
        }elseif ($email==''){
            echo  'email_error';
        }elseif ($sex==''){
            echo  'sex_error';
        }elseif ($code!=$captcha){
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
    public function captcha(){
        //先获取验证码
        $this->load->helper('captcha');
        $word = rand(1000,9999);
        $this->session->set_userdata('captcha',$word);

        $vals = array(
            'word'      => $word,
            'img_path'  => './captcha/',
            'img_url'   => 'http://127.0.0.1/php/my-blog/captcha/',
            'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => '100',
            'img_height'    => 30,
            'word_length'   => 8,
            'font_size' => 16,
            'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'    => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );
//		GD2
        $cap = create_captcha($vals);
        $img = $cap['image'];
        return $img;
    }
    public function get_captcha(){
        $img = $this->captcha();
        echo $img;
    }
    public function reg(){
        $img = $this->captcha();
        $this->load->view('reg',array(
            'captcha'=>$img
        ));
    }
    public function login_checked(){
        $email=$this->input->post('email');
        $pwd=$this->input->post('pwd');
        $row=$this->User_model->get_user_by_email_and_pwd($email,$pwd);
        if($row){
            $this->session->set_userdata('user',$row);
        }
        redirect('welcome/blog_list');
    }
    public function get_blog_list(){
        $id = $this->session->userdata('user')->id;
        $blog = $this->Blog_model->get_blog_list_by_id($id);
        return $blog;
    }
    public function blog_list(){
        $blog=$this->get_blog_list();
        $this->load->view('index_logined',array(
            'blogs'=>$blog
        ));
    }
    public function logout(){
        $this->session->unset_userdata('user');
        $this->load->view('login');
        redirect('welcome/login');
    }
    public function viewPost_comment($blog_id){
        $my_blogs=$this->get_blog_list();
        $blog=$this->Blog_model->get_blog_by_id($blog_id);
        $comments=$this->Blog_model->get_comment_by_blog_id($blog_id);
        $prev=null;
        $next=null;
        foreach ($my_blogs as $index=>$my_blog){
            if ($my_blog->blog_id == $blog->blog_id){
                if($index>0){
                    $prev=$my_blogs[$index-1];
                }
                if ($index<count($my_blogs)-1){
                    $next=$my_blogs[$index+1];

                }
            }
        }
        $this->load->view('viewPost_comment',array(
                'blog'=>$blog,
                'comment'=>$comments,
                'prev'=>$prev,
                'next'=>$next
        ));

    }
    public function time_tran($the_time)
    {
        $now_time = date("Y-m-d H:i:s", time() + 8 * 60 * 60);
        $now_time = strtotime($now_time);
        $show_time = strtotime($the_time);
        $dur = $now_time - $show_time;
        if ($dur < 0) {
            return $the_time;
        } else {
            if ($dur < 60) {
                return $dur . '秒前';
            } else {
                if ($dur < 3600) {
                    return floor($dur / 60) . '分钟前';
                } else {
                    if ($dur < 86400) {
                        return floor($dur / 3600) . '小时前';
                    } else {
                        if ($dur < 259200) {//3天内
                            return floor($dur / 86400) . '天前';
                        } else {
                            return $the_time;
                        }
                    }
                }
            }
        }
    }
}
