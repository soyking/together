<?php
class Activity extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function insert($activity_info){
		$this->db->insert('activity',$activity_info);
	}
	function select_all(){
		$time=date("Y-m-d H:i:s");
        $this->db->where('end_time >',$time); 
		$this->db->select('*');
		$query=$this->db->get('activity');
		return $query->result();
	}
	function select_limit($start,$count){
		$time=date("Y-m-d H:i:s");
        $this->db->where('end_time >',$time); 
		$this->db->select('*');
		$this->db->limit($count,$start);
		$query=$this->db->get('activity');
		return $query->result();
	}
}
?>