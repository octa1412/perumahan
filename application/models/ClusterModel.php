<?php
class ClusterModel extends CI_Model {

	public function __construct(){
		$this->load->database();
    }
    
    public function get_all($id = NULL){
		$this->db->select('perumahan.*, cluster.*');
		$this->db->join('cluster','perumahan.IDPerumahan = cluster.IDPerumahan', 'left');
		$this->db->from('perumahan');
		if ($id != NULL){
			$this->db->where('IDCluster',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
    }

	public function get_perumahan($id) {
		$this->db->select('perumahan.IDPerumahan, cluster.IDPerumahan');
		$this->db->join('cluster','perumahan.IDPerumahan = cluster.IDPerumahan','left');
		$this->db->from('perumahan');
		$this->db->where('nama_perumahan', $id);
		$query = $this->db->get();
		$final = $query->row(); 
		return $final->IDPerumahan;
	}

    public function insert($data){
        $this->db->insert('cluster', $data);
        if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}
	
	public function delete($id){
		// $this->db->where('IDPerumahan', $id);
		// $this->db->delete('perumahan');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message = $id;
	}

	public function update($where, $data){
		$this->db->where($where);
        $this->db->update('cluster', $data);
	}

}
?>