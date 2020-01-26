<?php
class Default_model extends CI_Model {

	public function __construct(){
		$this->load->database();
	}

	//GET DATABASE
	public function get_data_user($id = NULL){
		$this->db->select('*');
		$this->db->from('user');
		if ($id != NULL){
			$this->db->where('username',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_data_user_nopassword($id = NULL){
		$this->db->select('username');
		$this->db->from('user');
		if ($id != NULL){
			$this->db->where('username',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}


	//INSERT DATABASE
	public function insert_user($data){
		$this->db->insert('user', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}




	//UPDATE DATABASE
	public function update_user($id, $data){
		$this->db->where('username', $id);
		$this->db->update('user', $data);
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}


	//DELETE DATABASE
	public function delete_user($id){
		$this->db->where('username', $id);
		$this->db->delete('user');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}
	
}