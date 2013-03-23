<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	function index(){
		$this->load->helper('url');
		$this->load->view('register_view');
	}
	function info(){
		$this->load->model('user_info');
		$temp=$this->user_info->select_name_name($_POST["user_name"]);
		if (!empty($temp)) {
			echo "<script> alert('用户名已被注册！') </script>";
			echo "<script>location.href='/together/index.php/register/index' </script>";
			//Header("location:/together/index.php/register/index");
		} 
		else{
		$user_info["name"]=$_POST["user_name"];
		$user_info["password"]=md5($_POST["user_passwd"]);
		$user_info["sex"]=$_POST["user_sex"];
		$user_info["launch_right"]=1;
		$user_info["comment_right"]=1;
		$this->user_info->insert($user_info);
		//跳转
	    }
	}
	function check($name){
		$this->load->model('user_info');
		$temp=$this->user_info->select_name_name($name);
		if (!empty($temp)) echo "1"; else echo "0";
	}
}
