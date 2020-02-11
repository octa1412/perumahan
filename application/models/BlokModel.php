<?php
class BlokModel extends CI_Model {

	public function __construct(){
		$this->load->database();
    }
    
    public function get_all($id = NULL, $perumahan=NULL, $cluster=NULL, $blokcust=NULL){
        $this->db->select('*');
		$this->db->from('perumahan p');
		$this->db->join('cluster c','p.IDPerumahan = c.IDPerumahan', 'left');
		$this->db->join('blok b','b.IDCluster = c.IDCluster', 'right');
		$this->db->join('customer o','o.IDCustomer = b.IDCustomer', 'left');
		if ($id != NULL){
			$this->db->where('b.IDBlok',$id);
		}
		if ($perumahan != NULL){
			$this->db->where('p.IDPerumahan',$perumahan);
		}
		if ($cluster != NULL){
			$this->db->where('c.IDCluster',$cluster);
		}
		if ($blokcust != NULL){
			$this->db->where('b.IDCustomer',$blokcust);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_list_perumahan() {
		$this->db->select('nama_perumahan, status');
		$this->db->from('perumahan');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_list_cluster() {
		$this->db->select('nama_cluster');
		$this->db->from('cluster');
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

	public function get_cluster($id){
		$this->db->select('*');
		$this->db->from('cluster');
		$this->db->where('nama_cluster', $id);
		$query = $this->db->get();
		$final = $query->row(); 
		return $final->IDCluster;
	}

    public function insert($data){
        $this->db->insert('blok', $data);
        if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}
	
	public function delete($id){
		$this->db->where('IDBlok', $id);
		$this->db->delete('blok');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function update($where, $data){
		$this->db->where($where);
        $this->db->update('blok', $data);
	}

}
?>