<?php
class NotaDetailModel extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function get_by_tagihan($idTagihan){
        $this->db->select();
        $this->db->from('nota_detail');

        $this->db->where('IDNota',$idTagihan);

        $query = $this->db->get();
		return $query->result_array();
    }

    public function insert_one($idNota, $idTagihan){
        if(is_array($idTagihan)){
            foreach ($idTagihan as $tagihan){
                $data = array(
                    'IDNota' => $idNota,
                    'IDTagihan' => $tagihan
                );
                $this->db->insert('nota_detail', $data);
            }
        } else {
            $data = array(
                'IDNota' => $idNota,
                'IDTagihan' => $idTagihan
            );
            $this->db->insert('nota_detail', $data);
        }

    }
}
?>