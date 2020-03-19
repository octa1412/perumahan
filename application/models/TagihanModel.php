<?php
class TagihanModel extends CI_Model {


	public function __construct(){
		$this->load->database();
    }
	
	public function get_all_tagihan(){
		$this->db->select('IDTagihan');
		$this->db->from('tagihan');
		$this->db->order_by('tahun,bulan ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

    public function get_all($idBlok = NULL, $status, $startDate = NULL, $endDate = NULL, $distinct = FALSE){

		$this->db->select();
		$this->db->from('tagihan');
		
		if($status == 1){
			$this->db->join('nota_detail',
			'tagihan.IDTagihan = nota_detail.IDTagihan');
			$this->db->join('nota',
			'nota_detail.IDNota = nota.IDNota');
		}
		
		$this->db->where('tagihan.status',$status);
		$this->db->order_by('tahun,bulan ASC');

		if($idBlok != NULL){
			$this->db->where('tagihan.IDBlok',$idBlok);
		}

		if($startDate != NULL && $endDate != NULL){
			$this->db->where('nota.tanggal >=',$startDate);
			$this->db->where('nota.tanggal <=',$endDate);
		}

		if($distinct){
			$this->db->group_by("nota_detail.IDNota");
		}

		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_by_id($idTagihan){ 

        $this->db->select();
		$this->db->from('tagihan');
		
		$this->db->or_where_in('IDTagihan',$idTagihan);
		$this->db->order_by('tahun,bulan ASC');

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
		$this->db->from('customer c');
		$this->db->join('blok b','b.IDCustomer = c.IDCustomer');

		$this->db->join('tagihan t','t.IDBlok = b.IDBlok');
		$this->db->join('nota_detail n','n.IDTagihan = t.IDTagihan');
		$this->db->join('nota o','o.IDNota = n.IDNota');
		$this->db->join('user u','u.username = o.username');
		$this->db->where('n.IDNota', $id);
		$this->db->limit(1);
		$query = $this->db->get();
        return $query->result();

	}

	public function jmlbln($id){
		$this->db->select('*');
		$this->db->from('nota_detail n');
		$this->db->join('tagihan t','t.IDTagihan = n.IDTagihan');

		$this->db->where('IDNota', $id);

		$query = $this->db->get();
        return $query->result();


	}

	public function insert_tagihan($data){
		$this->db->insert('tagihan', $data);
        if ($this->db->affected_rows() > 0 ) {
			$return_message = 'success';
		}else{
			$return_message = 'failed';
		}
		return $return_message;
	}

	public function pdf_now($id){
		$this->db->select('t.Harga, t.bulan, t.tahun, t.IDBlok, t.status, u.nama_user, o.nama, b.nama_blok, b.type');
		$this->db->from('perumahan p');
		$this->db->join('user u','u.username = p.username');
		$this->db->join('cluster c','c.IDPerumahan = c.IDPerumahan');
		$this->db->join('blok b','b.IDCluster = c.IDCluster');
		$this->db->join('customer o','o.IDCustomer = b.IDCustomer');
		$this->db->join('tagihan t','b.IDBlok = t.IDBlok');
		$this->db->where('t.IDBlok', $id);

		$query = $this->db->get();
        return $query->result();
	}


	public function jmlblnpdf($id){
		$this->db->select('*');
		$this->db->from('tagihan');
		$this->db->where('IDBlok', $id);

		$query = $this->db->get();
        return $query->result();


	}


	public function sortirblok(){
		$this->db->select();
		$this->db->from('blok');

		$query = $this->db->get();
        return $query->result();


	}

}
?>