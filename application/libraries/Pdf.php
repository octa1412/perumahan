<?php
class pdf {

    function __construct() {
        include_once APPPATH . '/third_party/fpdf/fpdf.php';
    }

    public function getInstance(){
        return new Pdf();
    }
}
?>