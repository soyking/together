<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function log(){
		$this->load->view('login_view');
	}
	function check(){
		$this->load->model('user_info');
		$info=$this->user_info->select_name_all($_POST["user_name"]);
		if (empty($info) || $info[0]->password!=md5($_POST["user_passwd"])){
			echo "<script> alert('输入的用户名或密码有错！') </script>";
			echo "<script>location.href='/together/index.php/login/log' </script>";
		}
		else{
			$this->load->library('session');
			$id=array('id'=>$info[0]->id);
			$this->session->set_userdata($id);
			echo $this->session->userdata('id');
		}
	}
}