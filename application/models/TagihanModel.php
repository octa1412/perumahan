<?php
class TagihanModel extends CI_Model {


	public function __construct(){
		$this->load->database();
    }
    
    public function get_all($username, $status = NULL){

        $this->db->select();
		$this->db->from('tagihan');
		$this->db->join('nota_detail',
		 'tagihan.IDTagihan = nota_detail.IDTagihan');
		$this->db->join('nota',
		'nota_detail.IDNota = nota.IDNota');
		
		$this->db->where('nota.username',$username)

		if($status != NULL){
			$this->db->where('tagihan.status',$status)
		}

		$query = $this->db->get();
		return $query->result_array();
	}
	


}
?>