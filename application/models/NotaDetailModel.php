<?php
class NotaDetailModel extends CI_Model {
    public function __construct(){
        $this->load->database();
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