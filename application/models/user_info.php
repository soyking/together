<?php
class User_info extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function insert($user_info){
		$this->db->insert('user_info',$user_info);
	}
	function select_name_name($user_name){
		$this->db->where('name',$user_name);
		$this->db->select("name");
		$query=$this->db->get("user_info");
		return $query->result();
	}
	function select_name_all($user_name){
		$this->db->where('name',$user_name);
		$this->db->select("*");
		$query=$this->db->get('user_info');
		return $query->result();
	}
	function select_id_name($id){
		$this->db->where('id',$id);
		$this->db->select('name');
		$query=$this->db->get('user_info');
		return $query->result();
	}
}
?>