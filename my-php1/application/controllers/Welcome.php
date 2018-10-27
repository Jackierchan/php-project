<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
    public function login()
    {
        $this->load->view('login');
    }
    //http://localhost/my-php1/welcome/login
    //http://localhost/项目名/控制器名/方法名
    public function logup()
    {
        $this->load->view('logup');
    }
    public function save()
    {
        //        1.接收数据

        $data = array();
        $name = $this->input->post('username');
        $pwd1 = $this->input->post('pwd1');
        $pwd2 = $this->input->post('pwd2');
//        2.验证
        if ($name == '') {
            $data['name_error'] = '用户名不能为空';
//            redirect('welcome/logup');
        }elseif ($pwd1 == '') {
            $data['pwd1'] = '密码不能为空';
        }elseif ($pwd2 == '') {
            $data['pwd2'] = '确认密码不能为空';
        }elseif ($pwd1 != $pwd2) {
            $data['error'] = '两次不一致';
        }
//        3.连接数据库

        if (count($data)>0) {
            $this->load->view('logup', $data);
        }else{
            $this->load->model('User_model');
            $row=$this->User_model->save($name,$pwd1);
            if($row>0){
                echo 'success';
            }else{
                echo 'fail';
            }
        }
        //        4.跳转页面

    }
    public function login_check(){
        $name = $this->input->post('username');
        $pwd1 = $this->input->post('pwd1');
        $this->load->model('User_model');
        $result=$this->User_model->get_user_by_name_and_pwd($name,$pwd1);
        $this -> load ->view('welcome_message',array(
            'user'=>$result,
        ));


    }
}
