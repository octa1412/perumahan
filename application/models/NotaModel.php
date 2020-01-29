<?php
class NotaModel extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    //This model can be used in arsip page, transaksi page

    public function get_all($username){
        $this->db->select();
        $this->db->from('nota');
        $this->db->where($username);
		$query = $this->db->get();
		return $query->result_array();
    }

    public function get_by_filter($idNota = NULL, $rangeDate = NULL, $cluster = NULL){
        $this->db->select();
        $this->db->from('nota');
    
		if ($idNota != NULL){
			$this->db->where('IDNota',$idNota);
        }
        if($rangeDate != NULL){
            $this->db->where('tanggal > ',$rangeDate[0]);
            $this->db->where('tanggal < ',$rangeDate[1]);
        }
        if($cluster != NULL){
            $this->db->select();
            $this->db->from('nota');
            $this->db->join('nota_detail',
            'nota_detail.IDNota = nota.IDNota');
            $this->db->join('tagihan',
             'tagihan.IDTagihan = nota_detail.IDTagihan');
            $this->db->join('blok',
            'tagihan.IDBlok = blok.IDBlok');
            $this->db->join('cluster',
            'cluster.IDCluster = blok.IDCluster');
        }
    }

}
?>