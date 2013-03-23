<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Controller {
	function page($id){
	    $this->load->model('activity');
	    $content_number=5;
	    $link_number=3;
	    $config['total_rows']=count($this->activity->select_all());
		$config['per_page']=$content_number;
		$config['num_links']=$link_number;
		$config['base_url']="/together/index.php/show/page";
		$config['use_page_numbers'] = TRUE;
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$id=$id?$id:1;
		$start=($id-1)*$content_number;
		$content=$this->activity->select_limit($start,$content_number);
		var_dump($content);
		echo $this->pagination->create_links();
	}
}