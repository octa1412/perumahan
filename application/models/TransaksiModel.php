<?php
class TransaksiModel extends CI_Model {


	public function __construct(){
		$this->load->database();
    }
    
    public function get_all($perumahan = NULL, $cluster = NULL, $startDate = NULL, $endDate = NULL){

        $this->db->select('customer.nama, blok.nama_blok');
		$this->db->from('blok');
		$this->db->join('customer',
         'customer.IDCustomer = blok.IDCustomer');
         
        if($cluster != NULL){
            $this->db->where('blok.IDCluster', $cluster);
        }
        if($perumahan != NULL){
            $this->db->join('cluster',
             'blok.IDCluster = cluster.IDCluster');
            $this->db->join('perumahan',
             'cluster.IDPerumahan = perumahan.IDPerumahan');
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