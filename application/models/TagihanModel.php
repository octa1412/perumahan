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
	
	public function get_by_id($idTagihan){

        $this->db->select();
		$this->db->from('tagihan');
		
		$this->db->or_where_in('IDTagihan',$idTagihan);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function update_status($id){
		$this->db->set('status',"1");
		$this->db->or_where_in('IDTagihan', $id);
		$this->db->update('tagihan');
	}
	
	public function kuintansi($id){
		$this->db->select('*');
		$this->db->from('tagihan t');
		$this->db->join('nota_detail n','n.IDTagihan = t.IDTagihan', 'left');
		$this->db->join('nota o','o.IDNota = n.IDNota', 'left');
		$this->db->where('n.IDNota', $id);
		$this->db->limit(1);
		$query = $this->db->get();
        return $query->result();


	}


}
?>