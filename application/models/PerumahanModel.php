<?php
class PerumahanModel extends CI_Model {

	public function __construct(){
		$this->load->database();
    }
    
    public function get_all($id = NULL){
        $this->db->select('*');
		$this->db->from('perumahan');
		if ($id != NULL){
			$this->db->where('IDPerumahan',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
    }

	public function get_perumahan($id) {
		$this->db->select('*');
		$this->db->from('perumahan');
		$this->db->where('nama_perumahan', $id);
		$query = $this->db->get();
		$final = $query->row(); 
		return $final->IDPerumahan;
	}

    public function insert($data){
        $this->db->insert('perumahan', $data);
        if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}
	
	public function delete_perumahan1($id){
	
		$this->db->where('IDPerumahan', $id);
   		$this->db->delete('perumahan'); 

		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message = $id;
	}

	public function update($where, $data){
		$this->db->where($where);
        $this->db->update('perumahan', $data);
	}

}
?>