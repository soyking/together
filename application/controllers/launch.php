<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Launch extends CI_Controller {
	function index(){
		$this->load->helper('url');
		$this->load->view('launch_view');
	}
	function write(){
		$activity_info['title']=$_POST['title'];
		$activity_info['content']=$_POST['content'];
		$activity_info['begin_time']=$_POST['begin_time_year']."-".$_POST['begin_time_month']."-".$_POST['begin_time_day']." ".$_POST['begin_time_hour'].":00:00";
		$activity_info['end_time']=$_POST['end_time_year']."-".$_POST['end_time_month']."-".$_POST['end_time_day']." ".$_POST['end_time_hour'].":00:00";
		$activity_info['up']="0";
		$activity_info['situation']=1;
		$this->load->library('session');
		$id=$this->session->userdata('id');
		$this->load->model('user_info');
		$data=$this->user_info->select_id_name($id);
		$activity_info['sponsor']=$data[0]->name;
		$this->load->model('activity');
		$this->activity->insert($activity_info);
		//跳转
	}
}