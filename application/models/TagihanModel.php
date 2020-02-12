<?php
class TagihanModel extends CI_Model {


	public function __construct(){
		$this->load->database();
    }
    
    public function get_all($idBlok = NULL, $status, $startDate = NULL, $endDate = NULL){

        $this->db->select();
		$this->db->from('tagihan');
		
		if($status == 1){
			$this->db->join('nota_detail',
			'tagihan.IDTagihan = nota_detail.IDTagihan');
			$this->db->join('nota',
			'nota_detail.IDNota = nota.IDNota');
		}
		
		$this->db->where('tagihan.status',$status);

		if($idBlok != NULL){
			$this->db->where('tagihan.IDBlok',$idBlok);
		}

		// if($startDate != NULL && $endDate != NULL){
		// 	$this->db->where('nota.tanggal >=',$startDate);
		// 	$this->db->where('nota.tanggal <=',$endDate);
		// }

		$query = $this->db->get();
		return $query->result_array();
	}
	


}
?>