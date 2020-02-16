<?php
class ClusterModel extends CI_Model {

	public function __construct(){
		$this->load->database();
    }
    
    public function get_all($id = NULL, $perumahan=NULL, $username = NULL){
		$this->db->select('perumahan.*, cluster.*');
		$this->db->join('cluster','perumahan.IDPerumahan = cluster.IDPerumahan');
		$this->db->from('perumahan');
		if ($id != NULL){
			$this->db->where('IDCluster',$id);
		}
		if ($perumahan != NULL){
			$this->db->where('cluster.IDPerumahan',$perumahan);
		}
		if($username != NULL){
			$this->db->where('perumahan.username', $username);
		}
		$query = $this->db->get();
		return $query->result_array();
    }

	public function get_cluster($id) {
		$this->db->select('perumahan.IDPerumahan, cluster.IDPerumahan');
		$this->db->join('cluster','perumahan.IDPerumahan = cluster.IDPerumahan','right');
		$this->db->from('perumahan');
		$this->db->where('nama_cluster', $id);
		$query = $this->db->get();
		$final = $query->row(); 
		return $final->IDCluster;
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
		$this->db->where('IDCluster', $id);
		$this->db->delete('cluster');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function update($where, $data){
		$this->db->where($where);
        $this->db->update('cluster', $data);
	}
	public function get_by_perumahan($id = NULL){
        $this->db->select('*');
		$this->db->from('cluster');
		if ($id != NULL){
			$this->db->where('IDPerumahan',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>