<?php
class CustomerModel extends CI_Model {

	public function __construct(){
		$this->load->database();
    }
    
    public function get_all($id = NULL){
        $this->db->select("*");
		$this->db->from('customer');
		if ($id != NULL){
			$this->db->where('IDCustomer',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
    }

	public function get_detail($id = NULL){
		$this->db->select('*');
		$this->db->from('perumahan p');
		$this->db->join('cluster c','p.IDPerumahan = c.IDPerumahan', 'left');
		$this->db->join('blok b','b.IDCluster = c.IDCluster', 'right');
		$this->db->join('customer o','o.IDCustomer = b.IDCustomer', 'left');
		if ($id != NULL){
			$this->db->where('o.IDCustomer',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
    }

	public function get_customer($id) {
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('nama', $id);
		$query = $this->db->get();
		$final = $query->row(); 
		return $final->IDCustomer;
	}

    public function insert($data){
        $this->db->insert('customer', $data);
        if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}
	
	public function delete($id){
		$this->db->where('IDCustomer', $id);
		$this->db->delete('customer');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function update($where, $data){
		$this->db->where($where);
        $this->db->update('customer', $data);
	}

}
?>