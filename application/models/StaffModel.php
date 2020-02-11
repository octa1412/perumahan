<?php
class StaffModel extends CI_Model {

	public function __construct(){
		$this->load->database();
    }
    
    public function get_all($id = NULL){
        $this->db->select('perumahan.*, user.*');
        $this->db->join('user','perumahan.username = user.username','right');
        $this->db->from('perumahan');
        
		if ($id != NULL){
			$this->db->where('user.username',$id);
		} else {
            $this->db->where('user.pangkat','staff');
        }
		$query = $this->db->get();
		return $query->result_array();
	}
		
	public function get_staff(){
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();
		return $query->result_array();
	}

    public function insert($data){
        $this->db->insert('user', $data);
        if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}
	
	public function delete($id){
		$this->db->where('IDStaff', $id);
		$this->db->delete('staff');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message = $id;
	}

	public function update($where, $data){
		$this->db->where($where);
        $this->db->update('user', $data);
	}

}
?>