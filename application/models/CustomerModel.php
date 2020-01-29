<?php
class CustomerModel extends CI_Model {

    public $idCustomer;
    public $nama;
    public $nomor;
    public $email;

	public function __construct(){
		$this->load->database();
    }
    
    public function get_all($id = NULL){
        $this->db->select();
		$this->db->from('customer');
		if ($id != NULL){
			$this->db->where('IDCustomer',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
    }

    public function insert_one($data){
        $this->db->insert('user', $data);
        if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}
	
	public function delete($id){
		$this->db->where('user', $id);
		$this->db->delete('customer');
		if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

}
?>