<?php
class TransaksiModel extends CI_Model {


	public function __construct(){
		$this->load->database();
    }
    
    public function get_all($perumahan = NULL, $cluster = NULL, $rangeTanggal = NULL){

        $this->db->select('customer.nama, blok.IDBlok');
		$this->db->from('blok');
		$this->db->join('customer',
         'customer.IDCustomer = blok.IDCustomer');
         
        if($cluster != NULL){
            $this->db->where('blok.IDCluster', $cluster);
        }
        if($perumahan != NULL){
            $this->db->join('perumahan',
             'blok.IDCluster = perumahan.IDCluster');
            $this->db->where('perumahan.IDPerumahan', $perumahan);
        }
		// $this->db->join('nota',
		// 'nota_detail.IDNota = nota.IDNota');
		
		// $this->db->where('tagihan.status',$status);

		$query = $this->db->get();
		return $query->result_array();
	}
	


}
?>