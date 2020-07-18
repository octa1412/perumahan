<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller { 
	    	
	public function __construct(){
		parent::__construct();
		$this->load->model('Default_model');
		$this->load->model('CustomerModel');
		$this->load->model('TagihanModel');
		$this->load->model('TransaksiModel');
		$this->load->model('PerumahanModel');
		$this->load->model('ClusterModel');
		$this->load->model('BlokModel');
		$this->load->model('StaffModel');
		$this->load->model('NotaModel');
		$this->load->model('NotaDetailModel');
		$this->load->helper('url_helper');
		$this->load->library('pdf');
        $this->load->library('form_validation');
		date_default_timezone_set('Asia/Jakarta');
	}

	//LOAD VIEW

	//front
	public function index()
	{
		$this->load->view('login');

	}	

	//Dashboard admin
	public function dashboard(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/dashboard');
			$this->load->view('footer');
		}else if ($this->checkcookiestaff()) {
			$this->load->view('header1');
			$this->load->view('staff/blok_page');
			$this->load->view('footer');
		}else{
			header("Location: ".base_url()."index.php/");
			die();
		}
	}

	///profile
	public function profileadmin(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/profile_page');
			$this->load->view('footer');
		}else if ($this->checkcookiestaff()) {
			$this->load->view('header1');
			$this->load->view('admin/profile_page');
			$this->load->view('footer');
		}else{
			header("Location: ".base_url()."index.php/");
			die();
		}
	}

	//change password
	public function changepassword(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/change_password');
			$this->load->view('footer');
		}else if ($this->checkcookiestaff()) {
			$this->load->view('header1');
			$this->load->view('staff/change_password');
			$this->load->view('footer');
		}else {
			header("Location: ".base_url()."index.php/");
			die();
		}
	}

	//Cluster
	public function cluster(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/cluster_page');
			$this->load->view('footer');
		}else{
			header("Location: ".base_url()."index.php/");
			die();
		}
	}

	//Blok
	public function blok(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/blok_page');
			$this->load->view('footer');
		}else{
			header("Location: ".base_url()."index.php/");
			die();
		}
	}

	//Blok detail
	public function blokdetail(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/blok_detail_page');
			$this->load->view('footer');
		}else{
			header("Location: ".base_url()."index.php/");
			die();
		}
	}

	//Customer
	public function customer(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/customer_page');	
			$this->load->view('footer');
		}else{
			header("Location: ".base_url()."index.php/");
			die();
		}
	}

	//Staff
	public function staff(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/staff_page');	
			$this->load->view('footer');	 
		}else{
			header("Location: ".base_url()."index.php/");
			die();
		}
	}

	//Arsip
	public function arsip(){
		$idBlok = $this->input->post('id');
		if ($this->checkcookieuser()) {
			$data['idBlok'] = $idBlok;
			$this->load->view('header');
			$this->load->view('admin/arsip_admin_page', $data);
			$this->load->view('footer');
		}else if ($this->checkcookiestaff()) {
			$data['idBlok'] = $idBlok;
			$this->load->view('header1');
			$this->load->view('staff/arsip_staff_page', $data);
			$this->load->view('footer');
		}else {
			header("Location: ".base_url()."index.php/");
			die();
		}
	}

	//Transaksi
	public function arsipdata(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/arsip_page');
			$this->load->view('footer');
		}else {
			header("Location: ".base_url()."index.php/");
			die();
		}
	}

	//Detail iuran tagihan
	public function iurandetail(){
		$idBlok = $this->input->post('id');
		if ($this->checkcookieuser()) {
			$data['idBlok'] = $idBlok;
			$c = $this->create_cookie_encrypt("idblok",$idBlok);
			$this->load->view('header');
			$this->load->view('admin/tagihan_page',$data);
			$this->load->view('footer');
		} else if ($this->checkcookiestaff()) {
			$data['idBlok'] = $idBlok;
			$c = $this->create_cookie_encrypt("idblok",$idBlok);
			$this->load->view('header1');
			$this->load->view('staff/detail_iuran_page',$data);
			$this->load->view('footer');
		}else{
			header("Location: ".base_url()."index.php/");
			die();
		}
	}

	//Review iuran tagihan admin
	public function iuranreview(){
		$idTagihan = $this->input->post('data');
		$manual = $this ->input->post('manual');
		$id = $this ->input->post('idBlok');
		if ($this->checkcookiestaff()) {
			$data['idTagihan'] = $idTagihan;
			$data['manual'] = $manual;
			if($id != null){
				$data['id'] = $id;
				$data['harga'] = $this->BlokModel->get_harga($id);
			} else{
				$data['id'] = null;
				$data['harga'] = null;
			}
			$this->load->view('header1');
			$this->load->view('review_iuran',$data);
			$this->load->view('footer');
		}else if ($this->checkcookieuser()) {
			$data['idTagihan'] = $idTagihan;
			$data['manual'] = $manual;
			if($id != null){
				$data['id'] = $id;
				$data['harga'] = $this->BlokModel->get_harga($id);
			} else{
				$data['id'] = null;
				$data['harga'] = null;
			}
			$this->load->view('header');
			$this->load->view('review_iuran',$data);
			$this->load->view('footer');
		}else{
			header("Location: ".base_url()."index.php/");
			die();
		}
	}

	//add tagihan
	public function addtagihan(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/add_tagihan');
			$this->load->view('footer');
		}else{
			header("Location: ".base_url()."index.php/");
			die();
		}
	}


	public function cekuser(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/dashboard');
			$this->load->view('footer');
		}else if ($this->checkcookiestaff()) {
			$this->load->view('header1');
			$this->load->view('staff/blok_page');
			$this->load->view('footer');
		}else {
			header("Location: ".base_url()."index.php/");
			die();
		}
	}


	//GET DATA

	//ambil data user
	//note: password tidak diambil
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_all_user($return_var = NULL){
		$data = $this->Default_model->get_data_user_nopassword();
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//ambil data user berdasarkan username
	//note: ambil data user dari database berdasarkan username
	//parameter 1: username
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_user_by_id($id, $return_var = NULL){
		$data = $this->Default_model->get_data_user_nopassword($id);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//ambil data perumahan
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_all_perumahan($return_var = NULL){
		$data = $this->PerumahanModel->get_all();
			if (empty($data)){
				$data = [];
			}
			if ($return_var == true) {
				$jml = $data.length;
				return $data;
			}else{
				echo json_encode($data);
			}
	}

	//ambil data user berdasarkan username
	//note: ambil data user dari database berdasarkan username
	public function get_perumahan_by_id($return_var = NULL){
		$id = $this->input->post('id');
		$data = $this->PerumahanModel->get_all($id);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//ambil list nama perumahan
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_list_perumahan($return_var = NULL){
		$data = $this->BlokModel->get_list_perumahan();
			if (empty($data)){
				$data = [];
			}
			if ($return_var == true) {
				return $data;
			}else{
				echo json_encode($data);
			}
	}

	//ambil list nama cluster
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_list_cluster($return_var = NULL){
		$data = $this->BlokModel->get_list_cluster();
			if (empty($data)){
				$data = [];
			}
			if ($return_var == true) {
				return $data;
			}else{
				echo json_encode($data);
			}
	}

	//ambil data cluster
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_all_cluster($return_var = NULL){
		$perumahan = $this->input->post('perumahan');
		$username = $this->get_cookie_decrypt("staffCookie");

		if($username != NULL){
			$data = $this->ClusterModel->get_all(null, $perumahan, $username);
		}else{
			$data = $this->ClusterModel->get_all(null, $perumahan);
		}
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//ambil data user berdasarkan username
	//note: ambil data user dari database berdasarkan username
	public function get_cluster_by_id($return_var = NULL){
		$id = $this->input->post('id');
		$data = $this->ClusterModel->get_all($id);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_cluster_by_perumahan($return_var = NULL){
		$id = $this->input->post('id');
		$data = $this->ClusterModel->get_by_perumahan($id);
		
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	
	public function get_blok_by_cluster($return_var = NULL){
		$id = $this->input->post('id');
		$data = $this->BlokModel->get_blok_by_cluster($id);
		
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//ambil data blok
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_all_blok($isAdmin, $return_var = NULL){
		$perumahan = $this->input->post('perumahan');
		$cluster = $this->input->post('cluster');
		$username = $this->get_cookie_decrypt("staffCookie");

		if(!$isAdmin){
			$data = $this->BlokModel->get_all(null, $perumahan, $cluster,null,$username);
		}else{
			$data = $this->BlokModel->get_all(null, $perumahan, $cluster);
		}
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//ambil data blok yang ada penghuni
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_blok_data($return_var = NULL){
		$data = $this->BlokModel->data_get();
			if (empty($data)){
				$data = [];
			}
			if ($return_var == true) {
				// $jml = $data.length;
				return $data;
			}else{
				echo json_encode($data);
			}
	}

	//ambil data user berdasarkan username
	//note: ambil data user dari database berdasarkan username
	public function get_blok_by_id($return_var = NULL){
		$id = $this->input->post('id');
		$data = $this->BlokModel->get_all($id);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}


	//detailblok customer
	public function get_blok_customer($id, $return_var = NULL){
		$data = $this->Default_model->get_all($id);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}


	//ambil data staff
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_all_staff($return_var = NULL){
		$data = $this->StaffModel->get_all();
			if (empty($data)){
				$data = [];
			}
			if ($return_var == true) {
				return $data;
			}else{
				echo json_encode($data);
			}
	}

	//ambil data user berdasarkan username
	//note: ambil data user dari database berdasarkan username
	public function get_staff_by_id($return_var = NULL){
		$id = $this->input->post('id');
		$data = $this->StaffModel->get_all($id);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}


	//ambil data customer
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_all_customer($return_var = NULL){
		$data = $this->CustomerModel->get_all();
			if (empty($data)){
				$data = [];
			}
			if ($return_var == true) {
				return $data;
			}else{
				echo json_encode($data);
			}
	}

	//ambil data user berdasarkan username
	//note: ambil data user dari database berdasarkan username
	public function get_customer_by_id($return_var = NULL){
		$id = $this->input->post('id');
		$data = $this->CustomerModel->get_all($id);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	//ambil data arsip
	//parameter 1: true bila priviledge akses adalah dari admin
	//parameter 2: true bila ingin return array, kosongi bila ingin Json
	public function get_all_arsip($return_var = NULL){
		$input_data = json_decode($this->input->raw_input_stream, true);

		// $startDate = $this->input->post('startDate');
		// $endDate = $this->input->post('endDate');
		// $id = $this->input->post('id');

		$startDate = $input_data['startDate'];
		$endDate = $input_data['endDate'];
		$id = $input_data['id'];
		if($id != null){
			$data = $this->TagihanModel->get_all($id,1,$startDate,$endDate,TRUE);
		}else{
			// $id = $this->get_cookie_decrypt("staffCookie");
			$data = $this->TagihanModel->get_all($id,1,$startDate,$endDate,TRUE);
		}
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			$datas["data"] = $data;
			echo json_encode($datas);
		}
	}

	public function get_transaksi(){
		$perumahan = $this->input->post('perumahan');
		$cluster = $this->input->post('cluster');
		$data = $this->TransaksiModel->get_all($perumahan, $cluster);
		
		if (empty($data)){
			$data = ['0'];
		}
		echo json_encode($data);
	}

	public function get_tagihan_by_nota_id($return_var = NULL){
		$input_data = json_decode($this->input->raw_input_stream, true);
		$id = $input_data['id'];
		$data = $this->TagihanModel->get_by_nota($id);
		
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			$datas["data"] = $data;
			echo json_encode($datas);
		}
	}

	public function get_tagihan($return_var = NULL){
		$input_data = "";
		$id = $this->input->post('id');
		if($id == NULL){
			$input_data = json_decode($this->input->raw_input_stream, true);
			$id = $input_data['id'];
		}
		if(is_array($id)){
			$data = $this->TagihanModel->get_by_id($id);
		}else{
			$data = $this->TagihanModel->get_all($id,0);
		}
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			$datas["data"] = $data;
			echo json_encode($datas);
		}
	}

	//ambil data customer berdasarkan username
	//note: password tidak diambil
	//parameter 1: username
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_customer($id = null){
		$data = $this->CustomerModel->get_all($id);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
	}

	public function get_my_profile(){
		$username = $this->get_cookie_decrypt("adminCookie");
		if($username == NULL){
			$username = $this->get_cookie_decrypt("staffCookie");
		}
		$data = $this->Default_model->get_data_user_nopassword($username);
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}

	public function get_my_blok($return_var = NULL){
		$username = $this->get_cookie_decrypt("editblok");
		$data = $this->CustomerModel->get_detail($username);
		if (empty($data)){
			$data = [];
		}
		if ($return_var == true) {
			return $data;
		}else{
			echo json_encode($data);
		}
		// echo $username;
	}

	//INSERT

	//Tambah data user
	//note: API hanya bisa diakses saat ada cookie user
	//input: form POST seperti di bawah
	//output: success/failed/access denied
	public function insert_user(){
		if ($this->checkcookieuser()) {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);
			$insertStatus = $this->Default_model->insert_user($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}
	
	public function insert_perumahan() {
		if ($this->checkcookieuser()) {
			$spasi = str_replace(" ", "_", $this->input->post('nama'));
			$data = array(
				'nama_perumahan' => $this->input->post('nama'),
				'kota' => $this->input->post('kota'),
				'status' => '0'
			);
			$insertStatus = $this->PerumahanModel->insert($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	public function insert_cluster() {
		if ($this->checkcookieuser()) {
			$idperum = $this->input->post('perum');
			$cluster = $this->input->post('nama');

			$test = '';
			$test = $test.$idperum.'_'.$cluster;

			$data = array(
				'IDPerumahan' => $idperum,
				'nama_cluster' => $test
			);
			$insertStatus = $this->ClusterModel->insert($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	public function insert_blok() {
		if ($this->checkcookieuser()) {
			$nama = $this->input->post('nama');
			$cluster =  $this->input->post('cluster');
			$harga =  $this->input->post('harga');
			$type =  $this->input->post('type');
			
			$data = array(
				'nama_blok' => $nama,
				'IDCluster' => $cluster,
				'Harga' => $harga,
				'IDCustomer' => null,
				'type' => $type
			);
			$insertStatus = $this->BlokModel->insert($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	public function insert_blok_detail() {
		if ($this->checkcookieuser()) {
			$id = $this->get_cookie_decrypt("editblok");
			$perumahan =  $this->input->post('perumahan');
			$cluster =  $this->input->post('cluster');
			$blok =  $this->input->post('blok');
			
			$data = array(
				'IDCustomer' => $id
			);

			$where= array('IDBlok' => $blok );
        	$insertStatus = $this->BlokModel->update($where, $data);			
		}else{
			echo "access denied";
		}
	}

	public function insert_customer() {
		if ($this->checkcookieuser()) {
			$data = array(
				'nama' => $this->input->post('nama'),
				'nomor' => $this->input->post('nomor'),
				'email' => $this->input->post('email')
			);
			$insertStatus = $this->CustomerModel->insert($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	public function insert_staff() {
		if ($this->checkcookieuser()) {
			$username =  $this->input->post('user');
			$nomor =  $this->input->post('nomor');
			$perumahan = $this->input->post('perum');
			$email = $this->input->post('email');
			$staff = "staff";
			$nama = str_replace(" ", "_", $this->input->post('nama'));

			$data = array(
				'username' => $username,
				'password' => '827ccb0eea8a706c4c34a16891f84e7b',
				'nama_user' => $nama,
				'pangkat' => $staff,
				'nomor' => $nomor,
				'email' => $email
			);

			$data1 = array(
				'username' => $username,
				'status' => '1'
			);

			$where= array('IDPerumahan' => $perumahan );
			$insertStatus = $this->StaffModel->insert($data);
			$updateperumahan = $this->PerumahanModel->update($where, $data1);
			echo $nama;
		}else{
			echo "access denied";
		}
	}

	public function add_tagihan_manual(){
		if ($this->checkcookieuser()) {
			$all = $this->TagihanModel->get_all_tagihan();

			$blok = $this->input->post('blok');
			$tahun = $this->input->post('tahun');
			$bulan = $this->input->post('bulan');
			$jmlbulan = count($bulan);

			$kondisi = '';
			$coba = '';
			$posisi = 0;
			// echo ;
			foreach($bulan as $blnmsk){
				$thnini = $tahun[$posisi];
				$coba = $blok.$blnmsk.$thnini; 
				foreach($all as $satuan){
					if($coba == $satuan['IDTagihan']){					
						// echo "Data Tagihan Sudah Ada!";
						$kondisi = 'ada';
						break;
					} 					
				}
				$posisi = $posisi + 1;
				$coba = '';
			}
			
			$posisi = 0;

			if($kondisi == 'ada') {
				echo 'Data sudah ada!';
			} else {
				foreach($bulan as $blnnya){
					$thninput = $tahun[$posisi];
					$data = array(
						'IDTagihan' => $blok.$blnnya.$thninput,
						'IDBlok' => $this->input->post('blok'),
						'bulan' => $blnnya,
						'tahun' => $thninput,
						'Harga' => $this->input->post('harga'),
						'status' => '0'					
					);
					$insertStatus = $this->TagihanModel->insert_tagihan($data);	
					$posisi = $posisi + 1;

				}
					echo 'Data Berhasil Ditambahkan!';

			}
					
			$kondisi = '';
			
		}else{
			echo "access denied";
		}
	}

	public function tagihanmanual(){
		$username = "";
		if($this->checkcookiestaff()){
			$username = $this->get_cookie_decrypt("staffCookie");
		} else if($this->checkcookieuser()){
			$username = $this->get_cookie_decrypt("adminCookie");
		}else{
			die();
		}
		$data = $this->input->post('data');
		$blok = $this->input->post('id');
		$harga = $this->input->post('harga');
		$keterangan = $this->input->post('keterangan');
		$idsementara = '';
		$all = $this->TagihanModel->get_all_tagihan();
		$kondisi = '';

		foreach($data as $monthYear){
			$idsementara = $idsementara.$blok.$monthYear['month'].$monthYear['year'];

			foreach($all as $satuan){
				if($idsementara == $satuan['IDTagihan']){					
					$kondisi = 'ada';
					break;
				} 					
			}
			if($kondisi == 'ada'){

			} else {
				$tagihan = array(
						'IDTagihan' => $blok.$monthYear['month'].$monthYear['year'],
						'IDBlok' => $blok,
						'bulan' => $monthYear['month'],
						'tahun' => $monthYear['year'],
						'harga' => $harga
					);
				$this->TagihanModel->insert_tagihan($tagihan);
			}

			$idsementara = '';
			$kondisi='';

		}
	}


	//UPDATE

	//Ubah password user
	//note: API hanya bisa diakses saat ada cookie user
	//parameter 1: username
	//input: form POST seperti di bawah
	//output: success/failed/id not found/wrong old password/access denied
	public function update_password_user(){
		if ($this->checkcookieuser()) {
			$password = md5($this->input->post('passw'));			
			$username = $this->get_cookie_decrypt("adminCookie");

			$data = array(
				'password' => $password
			);
			
			$where= array('username' => $username );
			$this->StaffModel->update($where, $data);

		}else if($this->checkcookiestaff()){
			$password = md5($this->input->post('passw'));			
			$username = $this->get_cookie_decrypt("staffCookie");

			$data = array(
				'password' => $password
			);
			
			$where= array('username' => $username );
			$this->StaffModel->update($where, $data);			
		} else {
			echo "access denied";
		}
	}

	//Edit data perumahan
	public function update_perumahan(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$kota = $this->input->post('kota');

		$data = array(
            'nama_perumahan' => $nama,
            'kota' => $kota,
		);
		
		$where= array('IDPerumahan' => $id );
		$this->PerumahanModel->update($where, $data);
		
	}

	//Edit data cluster
	public function update_cluster(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$idperum = $this->input->post('perumahan');

		$test = '';
		$test = $test.$idperum.'_'.$nama;

		$data = array(
			'nama_cluster' => $test,
			'IDPerumahan' => $idperum
		);
		
		$where= array('IDCluster' => $id );
        $this->ClusterModel->update($where, $data);
	}

	//Edit data blok
	public function update_blok(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$perumahan = $this->input->post('perumahan');
		$cluster = $this->input->post('cluster');
		$harga = $this->input->post('harga');		

		$data = array(
			'nama_blok' => $nama,
			'IDCluster' => $cluster,
			'Harga' => $harga
		);
		
		
		$where= array('IDBlok' => $id );
        $this->BlokModel->update($where, $data);

		echo $cluster;
	}

	//Edit data blok
	public function update_blok_detail(){
		$id = $this->input->post('id');		

		$data = array(
			'IDCustomer' => null
		);	
		
		$where= array('IDBlok' => $id );
        $this->BlokModel->update($where, $data);
	}

	//Edit data customer
	public function update_customer(){
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$nomor = $this->input->post('nomor');

		$data = array(
            'IDCustomer' => $id,
			'nama' => $nama,
			'nomor' => $nomor,
			'email' => $email
		);
		
		$where= array('IDCustomer' => $id );
		$this->CustomerModel->update($where, $data);
		
	}


	//Edit data staff
	public function update_staff(){
		$username = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nomor = $this->input->post('nomor');
		$email = $this->input->post('email');
		$idperum = $this->input->post('perum');
		$idlama = $this->input->post('idlama');

		$data = array(
			'username' => $username,
			'nama_user' => $nama,
			'nomor' => $nomor,
			'email' => $email
		);

		//update tabel perumahan utk username ada staff
		$data1 = array(
			'username' => $username,
			'status' => '1'
		);

		//update tabel perumahan hapus staff
		$data2 = array(
			'username' => null,
			'status' => '0'
		);

		if($idperum != null) {
			if($idperum != $idlama) {
				$where1= array('IDPerumahan' => $idperum );
				$this->PerumahanModel->update($where1, $data1);
				$where2= array('IDPerumahan' => $idlama );
				$this->PerumahanModel->update($where2, $data2);
			} 
		}
		$where= array('username' => $username );
		$this->StaffModel->update($where, $data);
				
	}
	
	public function do_bayar(){
		$username = "";
		if($this->checkcookiestaff()){
			$username = $this->get_cookie_decrypt("staffCookie");
		}else if($this->checkcookieuser()){
			$username = $this->get_cookie_decrypt('adminCookie');
		}else{
			die();
		}
			$id = $this->input->post("id");
			$diskon = $this->input->post("diskon");
			$total_awal = $this->input->post("total_awal");
			$keterangan = $this->input->post("keterangan");
			try{
				$this->TagihanModel->update_status($id);
				$notaID = $this->NotaModel->insert_one($username,$total_awal,$diskon, $keterangan);
				$this->NotaDetailModel->insert_one($notaID, $id);
				$c = $this->create_cookie_encrypt("idcetak",$notaID);
		
				echo $notaID;
			} catch(Exception $e){
				echo "error";
			}
	}

	public function view_pdf(){
		$id = $this->input->post("data");
		$c = $this->create_cookie_encrypt("idcetak",$id);	
		echo 'idnya ' + $c;
	}

	public function update_profile(){
		$nomor = $this->input->post('nomor');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$nama = str_replace(" ", "_", $this->input->post('nama'));


		$id = $this->get_cookie_decrypt("adminCookie");
		if($id == NULL){
			$id = $this->get_cookie_decrypt("staffCookie");
		}
		
		if($password == NULL){
			$data = array(
				'nama_user' => $nama,
				'nomor' => $nomor,
				'email' => $email
			);
		} else{
			$data = array(
				'nama_user' => $nama,
				'nomor' => $nomor,
				'email' => $email,
				'password'=> $password
			);
		}
		$deleteStatus = $this->Default_model->update_user($id, $data);

		echo "Data saved !";
	}

	//Reset password staff
	public function reset_pass_staff(){
		$id = $this->input->post('id');

		$data = array(
            'password' => '827ccb0eea8a706c4c34a16891f84e7b'
		);
		
		$where= array('username' => $id );
		$this->StaffModel->update($where, $data);
		
	}



	//DELETE

	//Delete user
	//note: API hanya bisa diakses saat ada cookie user
	//parameter 1: username
	//output: success/failed/access denied
	public function delete_user($id){
		if ($this->checkcookieuser()) {
			$deleteStatus = $this->Default_model->delete_user($id);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	public function delete_perumahan() {
		if ($this->checkcookieuser()) {
			$username = $this->input->post('id');
			$kd = array('IDPerumahan' => $username);

			$deleteStatus = $this->PerumahanModel->delete_perumahan1($username);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	public function delete_customer() {
		if ($this->checkcookieuser()) {
			$username = $this->input->post('id');

			$data = array(
				'IDCustomer' => null
			);
		
		
			$where= array('IDCustomer' => $username );
			$this->BlokModel->update($where, $data);

			$deleteStatus = $this->CustomerModel->delete($username);
			echo $username;
		}else{
			echo "access denied";
		}
	}

	public function delete_cluster(){
		if ($this->checkcookieuser()) {
			$username = $this->input->post('id');
			$deleteStatus = $this->ClusterModel->delete($username);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	public function delete_blok(){
		if ($this->checkcookieuser()) {
			$username = $this->input->post('id');
			$deleteStatus = $this->BlokModel->delete($username);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	public function delete_staff(){
		if ($this->checkcookieuser()) {
			$username = $this->input->post('id');

			$data = array(
				'username' => null,
				'status' => '0'
			);

			$where= array('username' => $username );
			$this->PerumahanModel->update($where, $data);
			$deleteStatus = $this->StaffModel->delete($username);


			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	//OTHER

	//Login user
	//note: -
	//input: form POST seperti di bawah
	//Output: berhasil login / gagal login
	public function cekloginuser(){

		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$data = $this->Default_model->get_data_user();
		$status = 'null';
		$is_login = false;
		foreach ($data as $row){
			if ($username == $row['username'] && $password == $row['password']) {
				if($row['pangkat'] == 'admin'){
					$this->create_cookie_encrypt("adminCookie",$username);
					$status = 'admin';
					$is_login = true;
					break;

				} else if($row['pangkat'] == 'staff'){
					$this->create_cookie_encrypt("staffCookie",$username);
					$status = 'staff';
					$is_login = true;
					break;
				}
				
			}
		}
		if ($status == 'admin') {
			echo "admin";
		} else if ($status == 'staff') {
			echo "staff";
		} else{
			echo "gagal login";
		}
	}


	//Check cookie admin
	//note: tidak untuk front end
	public function checkcookieuser(){
		$this->load->helper('cookie');
		if ($this->input->cookie('adminCookie',true)!=NULL) {
			return true;
		}else{
			return false;
		}
	}

	//Check cookie staff
	//note: tidak untuk front end
	public function checkcookiestaff(){
		$this->load->helper('cookie');
		if ($this->input->cookie('staffCookie',true)!=NULL) {
			return true;
		}else{
			return false;
		}
	}

	//Logout
	//note: menghapus cookie dan langsung redirect ke halaman login
	public function logoutuser(){
		$this->load->helper('cookie');
		if ($this->input->cookie('adminCookie',true)!=NULL) {
			delete_cookie("adminCookie");
		}else if ($this->input->cookie('staffCookie',true)!=NULL){
			delete_cookie("staffCookie");
		}
		
		header("Location: ".base_url()."index.php");
		die();
	}

	//untuk membuat cookie
	//parameter 1: nama cookie (opsional)
	//parameter 2: value cookie (opsional)
	//parameter 3: expire (opsional)
	//input: form POST seperti di bawah (opsional bila tidak bisa menggunakan parameter)
	//output: -
	public function create_cookie($name = NULL, $value = NULL, $expire = NULL){
		if ($name == NULL) {
			$name = $this->input->post('name');
		}
		if ($value == NULL) {
			$value = $this->input->post('value');
		}
		if ($expire == NULL) {
			$expire = 0;
		}
		$this->load->helper('cookie');
		$cookie= array(
			'name'   => $name,
			'value'  => $value,
			'expire' => $expire
		);
		$this->input->set_cookie($cookie);
		echo "cookie created";
	}

	//untuk mengambil cookie
	//note: JANGAN GUNAKAN INI UNTUK MENGAMBIL COOKIE USER (karena sudah di encrypt), gunakan get_cookie_decrypt() di bawah
	//parameter 1: nama cookie
	//output: no cookie / $cookie
	public function get_cookie($name){
		$this->load->helper('cookie');
		if ($this->input->cookie($name,true)!=NULL) {
			echo $this->input->cookie($name,true);
		}else{
			echo "no cookie";
		}
	}

	//untuk membuat cookie yang diencrypt
	//parameter 1: nama cookie (opsional)
	//parameter 2: value cookie (opsional)
	//parameter 3: expire (opsional)
	//input: form POST seperti di bawah (opsional bila tidak bisa menggunakan parameter)
	//output: -
	public function create_cookie_encrypt($name = NULL, $value = NULL, $expire = NULL){
		if ($name == NULL) {
			$name = $this->input->post('name');
		}
		if ($value == NULL) {
			$value = $this->input->post('value');
		}
		if ($expire == NULL) {
			$expire = 0;
		}
		$this->load->helper('cookie');
		$cookie= array(
			'name'   => $name,
			'value'  => $this->str_rot($value), //Not really encrypt anything, just jumble text :P
			'expire' => $expire
		);
		$this->input->set_cookie($cookie);
		// echo "cookie created";
	}

	//untuk mengambil cookie yang di decrypt dari fungsi create_cookie_encrypt
	//parameter 1: nama cookie
	//output: no cookie / $cookie
	public function get_cookie_decrypt($name){
		$this->load->helper('cookie');
		if ($this->input->cookie($name,true)!=NULL) {
			return $this->str_rot($this->input->cookie($name,true));
		}else{
			return null;
		}
	}

	//verifikasi empty login
	public function aksilogin(){
		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
           echo json_encode(['success'=>'Record added successfully.']);
        }
	}

	//verifikasi change password empty
	public function aksipass(){
		$this->form_validation->set_rules('password', 'Password', 'required|matches[re_password]');
        $this->form_validation->set_rules('re_password', 'Retype Password', 'required');


        if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
           echo json_encode(['success'=>'Record added successfully.']);
        }
	}

	public function cek_data_empty(){
		$id = $this->input->post('id');
		$data = $this->TagihanModel->jmlblnpdf($id);
		$kondisi = '';

		foreach($data as $cek){
			if($cek->status == '0'){
				$kondisi = 'ada';
			}
		}

		if($kondisi != 'ada'){
			echo 'kosong';
		}

	}

	//fungsi tambah tagihan bulanan
	public function input_transaksi(){
		$dt = new DateTime(null, new DateTimeZone('Asia/Jakarta')); 
		$bulan = $dt->format('n');
		$tahun = $dt->format('Y');

		$idsementara = '';
		$nilaiharga = '';
		$harga1 = '';
		$nilaiblok = '';
		$blok1 = '';
		$kondisi = '';

		$data = $this->TagihanModel->sortirblok();
		$all = $this->TagihanModel->get_all_tagihan();

		foreach($data as $hasil) {
			if(json_encode($hasil->IDCustomer) != null){
				$nilaiharga = json_encode($hasil->Harga);
				$nilaiblok = json_encode($hasil->IDBlok);
				$number = str_replace('"', "", $nilaiharga);
				$harga1 = intval($number);
				$blok1 = str_replace('"', "", $nilaiblok);
				$idsementara = $idsementara.$blok1.$bulan.$tahun;

				foreach($all as $satuan){
					if($idsementara == $satuan['IDTagihan']){					
						$kondisi = 'ada';
						break;
					} 					
				}

				if($kondisi == 'ada') {
				} else {
					$data = array(
						'IDTagihan' => $idsementara,
						'IDBlok' => $blok1,
						'bulan' => $bulan,
						'tahun' => $tahun,
						'Harga' => $harga1,
						'status' => '0'			
					);
					$insertStatus = $this->TagihanModel->insert_tagihan($data);	
				}
			}
			
			$idsementara = '';
			$nilaiharga = '';
			$harga1 = '';
			$nilaiblok = '';
			$blok1 = '';
			$kondisi = '';		
		}
	}


	public function str_rot($s, $n = 13) {
		static $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$n = (int)$n % 26;
		if (!$n) return $s;
		for ($i = 0, $l = strlen($s); $i < $l; $i++) {
			$c = $s[$i];
			if ($c >= 'a' && $c <= 'z') {
				$s[$i] = $letters[(ord($c) - 71 + $n) % 26];
			} else if ($c >= 'A' && $c <= 'Z') {
				$s[$i] = $letters[(ord($c) - 39 + $n) % 26 + 26];
			}
		}
		return $s;
	}


	//utk penulisan fungsi terbilang pada kuintansi
	public function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = $this->penyebut($nilai/10)." Puluh". $this->penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . $this->penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . $this->penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}

	public function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim($this->penyebut($nilai));
		} else {
			$hasil = trim($this->penyebut($nilai));
		}     		
		return $hasil;
	}

	public function switch_bulan($angka){
		$angkabln = '';
		switch($angka){
			case '1':
				$angkabln = 'January';
				break;
			case '2':
				$angkabln = 'Febuary';
				break;
			case '3':
				$angkabln = 'March';
				break;
			case '4':
				$angkabln = 'April';
				break;
			case '5':
				$angkabln = 'May';
				break;
			case '6':
				$angkabln = 'June';
				break;
			case '7':
				$angkabln = 'July';
				break;
			case '8':
				$angkabln = 'August';
				break;
			case '9':
				$angkabln = 'September';
				break;
			case '10':
				$angkabln = 'October';
				break;
			case '11':
				$angkabln = 'November';
				break;
			case '12':
				$angkabln = 'December';
				break;

			case '01':
				$angkabln = 'January';
				break;
			case '02':
				$angkabln = 'Febuary';
				break;
			case '03':
				$angkabln = 'March';
				break;
			case '04':
				$angkabln = 'April';
				break;
			case '05':
				$angkabln = 'May';
				break;
			case '06':
				$angkabln = 'June';
				break;
			case '07':
				$angkabln = 'July';
				break;
			case '08':
				$angkabln = 'August';
				break;
			case '09':
				$angkabln = 'September';
				break;
			
		}

		return $angkabln;
	}



/////////////////////////////////////////////////////////////mencetak kuintansi pdf tagihan pembayaran
	public function cetak_pdf(){
		$no = 1;
		$username = $this->get_cookie_decrypt("idcetak");
		$data = $this->TagihanModel->kuintansi($username);
		$bulannya = $this->TagihanModel->jmlbln($username);
		$dt = new DateTime(null, new DateTimeZone('Asia/Jakarta')); 
		$c_pdf = $this->pdf->getInstance();

		$abc = 0;
		$jml = 0;
		$idhasilcek = 0;
		$posisidata = 2;
		$kondisitahun = '';
		$kondisiharga ='';
		$cekondisi = '';
		$test = 0;
//array data pertama
		$dataharga = array(
			array(
			'1',
			($bulannya[0]->Harga),
			($bulannya[0]->tahun),
			($bulannya[0]->bulan)
			)
		);
		
	
//cari jumlah bulan yg diinput
		foreach($bulannya as $item) {
			$jml = $jml + 1;
		}

//cek ad brp baris
		for($i=1; $i<$jml; $i++){
			foreach($dataharga as $ok) {
				if($ok[2] == $bulannya[$i]->tahun){					
					$kondisitahun = 'ada';
					if($ok[1] == $bulannya[$i]->Harga){					
						$kondisiharga = 'ada';
						break;
					} else {
						$kondisiharga = "taksama";
					}	
				} else {
					$kondisitahun = "taksama";
					
				}		
			}

//input data ke array
			if($kondisiharga == 'taksama' || $kondisitahun == 'taksama'){
				$arraybaru = array(
					$posisidata,
					$bulannya[$i]->Harga,
					$bulannya[$i]->tahun,
					$bulannya[$i]->bulan					
				);
				$posisidata = $posisidata + 1;
				$abc = $abc + 1;			
				array_push($dataharga, $arraybaru);
			} else if($kondisitahun == 'ada'){
				if($kondisiharga == 'ada'){
					foreach($dataharga as $cektempat) {
						if($bulannya[$i]->tahun == $cektempat[2]){
							if($bulannya[$i]->Harga == $cektempat[1]){
								$abc = $abc + 1;			

								$arraybaru = array(
									$cektempat[0],
									$bulannya[$i]->Harga,
									$bulannya[$i]->tahun,
									$bulannya[$i]->bulan					
								);
								array_push($dataharga, $arraybaru);
							break;
							}
						}
					}
					$idhasilcek = 0;
				} else if($kondisiharga == 'taksama' && $kondisitahun== 'ada'){
					$arraybaru = array(
						$posisidata,
						$bulannya[$i]->Harga,
						$bulannya[$i]->tahun,
						$bulannya[$i]->bulan					
					);
					$posisidata = $posisidata + 1;
					$abc = $abc + 1;			
					array_push($dataharga, $arraybaru);
				}
			}

			$kondisiharga = '';
			$kondisitahun = '';
		}

		$tempsementara = array(); //array menyimpan jumlah banyak data tiap id dengan harganya, format (id, harga, jmlbulan)
		$jumlahdataharga = 0;
		$jumlahdatahargafix = 0;

		for($i=0; $i<$posisidata-1; $i++){

			for($j=0; $j<$abc+1;$j++){
				if($dataharga[$j][0] == ($i+1)){
					$jumlahdataharga = $jumlahdataharga + 1;
				}	

			}
			$arrayid = array(($i+1), $dataharga[$i][1], $jumlahdataharga);
			array_push($tempsementara, $arrayid);
			
			$jumlahdatahargafix = $jumlahdatahargafix + $jumlahdataharga;

			$jumlahdataharga = 0;


		}

		$dataJmlThnFix = array($dataharga[0][2]);

		//dapetin bnyknya tahun
		for($a=1; $a<count($dataharga); $a++){
			if($dataharga[$a][2] != $dataJmlThnFix[0]){
				if(count($dataJmlThnFix) == 1){
					array_push($dataJmlThnFix, $dataharga[$a][2]);
				} else  {
					for($b=1; $b<count($dataJmlThnFix); $b++){
						if($dataharga[$a][2] != $dataJmlThnFix[$b]){
							array_push($dataJmlThnFix, $dataharga[$a][2]);
						}
					}
				}
			}
		}

		// $variabel1 = array();
		// if($data1 != $data2){
		// 	if($variabel1 == null){
		// 		$variabel1 = $data1;
		// 	} else if($variabel1 != $data2){
		// 		array_push($variabel1, 'harga');
		// 	} 
		// }

		$SemuaDataFix = array(array());
		$Transfer = array();
		$posisiTransfer = [];
		$dataNamaBln = [];
		$pos = 0;
		$JmlBaris = 0;
		$posisiterbaru = 0;

	
		for($d=0; $d<count($dataJmlThnFix); $d++){
			for($c=0; $c<count($dataharga); $c++){
				if($dataJmlThnFix[$d] == $dataharga[$c][2]){

					$posisiTransfer[] = $c;
					$dataNamaBln[] = $dataharga[$c][3];
					
				}
			}
			for($b=0; $b<count($posisiTransfer); $b++){
				for ($a=count($posisiTransfer)-1; $a>$b; $a--){
					if ($dataharga[$posisiTransfer[$a]][3] < $dataharga[$posisiTransfer[$a-1]][3]){
						$pos = $posisiTransfer[$a-1];
						$posisiTransfer[$a-1] = $posisiTransfer[$a];
						$posisiTransfer[$a] = $pos;
					}
				}
			}
		
		

			$angkaTerkecil = min($dataNamaBln);
			$angkaTerbesar = max($dataNamaBln);
			

			$JmlBaris = $JmlBaris + 1;	


			for ($x = $angkaTerkecil; $x <= $angkaTerbesar; $x++) {
				if (! in_array($x, $dataNamaBln)) {
					$JmlBaris = $JmlBaris + 1;		
			
				} else {
					$Transfer = array(
						$dataharga[$posisiTransfer[$posisiterbaru]][0],
						$dataharga[$posisiTransfer[$posisiterbaru]][1],
						$dataharga[$posisiTransfer[$posisiterbaru]][2],
						$dataharga[$posisiTransfer[$posisiterbaru]][3],
						$JmlBaris
					);
					array_push($SemuaDataFix, $Transfer);
					$posisiterbaru = $posisiterbaru + 1;
				}
				
				
			}

	
			$posisiterbaru = 0;
			unset($posisiTransfer);
			unset($dataNamaBln);
			
		}
		
		$jumlah = 0;
		$hasilBulan = 0;
		$variabel1 = array();
		$jmlTambahanHarga = 0;

		// sort($dataharga);

		$yng = $this->terbilang($data[0]->total_awal);

        $c_pdf = new FPDF('P', 'mm', 'A4');
        $c_pdf->AddPage();
        $c_pdf->header('Arial');
        $c_pdf->setTopMargin(15);
        $c_pdf->setLeftMargin(12);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial','', 15);
        $c_pdf->Cell(75,10,'MANAGEMENT STATE', 0,1, 'C');
        $c_pdf->SetFont('Arial', 'B', 17);
        $c_pdf->Cell(10);
		$c_pdf->Cell(190,7, 'PURI SAFIRA RESIDENCE', 0,1,'L');
        $c_pdf->SetFont('Arial', 'B', 8);
        $c_pdf->Cell(10);
		$c_pdf->Cell(75,5, 'Jl. Raya Darmo No.75-77, Surabaya',0,0, 'C');
		$c_pdf->SetFont('Arial', 'U',25);
		$c_pdf->Cell(30);
		$c_pdf->Cell(120,5, 'Tanda Terima',0,1, 'L');
		$c_pdf->SetFont('Arial', 'B',7);
		$c_pdf->Cell(10);
		$c_pdf->Cell(75,4, 'Telp. (031) 5666615, 5666616',0,1, 'C');
	   		
		$c_pdf->Line(15, 40, 220-25, 40);
        $c_pdf->Line(15, 40, 220-25, 40);
        $c_pdf->Line(15, 40, 220-25, 40);

        $c_pdf->Cell(10,8, '', 0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial', '', 12);
        $c_pdf->Cell(40,8,'Sudah Terima dari :' ,0,0, 'L');
		$c_pdf->Cell(55,8, $data[0]->nama ,0,0, 'L');

		$c_pdf->Cell(14,8,'Type: ',0,0,'L');
		$c_pdf->Cell(20,8, $data[0]->type ,0,0,'L');
		$c_pdf->Cell(14,8,'Blok:',0,0,'L');
		$c_pdf->Cell(20,8, $data[0]->IDBlok,0,1,'L'); 

		$c_pdf->Cell(10);
        $c_pdf->Cell(40,8, 'Terbilang                :',0,0, 'L');
        $c_pdf->Cell(40,8, $yng,0,1, 'L');
        
		$c_pdf->Cell(10);
        $c_pdf->Cell(40,8, 'Untuk Pembayaran:',0,0, 'L');
        $c_pdf->Cell(40,8, 'IURAN MANAGEMENT ESTATE',0,1, 'L');

		$c_pdf->Cell(50);
		$c_pdf->Cell(16,8, 'Bulan :',0,0, 'L');
		$c_pdf->Cell(40,8, '' ,0,1, 'L');

		for($p=1; $p<$JmlBaris+1; $p++){
			for($q=1; $q<count($SemuaDataFix); $q++){			

				if($p == $SemuaDataFix[$q][4]){
					$jumlah = $jumlah + 1;
					$hasilBulan = $q;
				}

				
			}

			
	

			//print hasilnya (arrray[0][1] = harga, arrray[0][2] = tahun, arrray[0][3] = bulan(dlm angka), arrray[0][4] = jenis pisahnya, )
			if($jumlah == 1){
				$namabulan = $this->switch_bulan($SemuaDataFix[$hasilBulan][3]).' '.$SemuaDataFix[$hasilBulan][2];
				$HrgBln = $SemuaDataFix[$hasilBulan][1];
				$totalakhir = $jumlah * $HrgBln;
			}else {
				$namabulan = $this->switch_bulan($SemuaDataFix[$hasilBulan-($jumlah-1)][3]).' - '.$this->switch_bulan($SemuaDataFix[$hasilBulan][3]).' '.$SemuaDataFix[$hasilBulan][2];
				$HrgBln = $SemuaDataFix[$hasilBulan][1];
				$totalakhir = $jumlah * $HrgBln;
			}

			

			$c_pdf->Cell(50);
			$c_pdf->Cell(55,8, $namabulan ,0,0, 'L');
			$c_pdf->Cell(7,8, ': '.$jumlah ,0,0, 'L');
			$c_pdf->Cell(22,8, 'bulan x Rp.',0,0, 'L');
			$c_pdf->Cell(14,8,  $HrgBln ,0,0, 'L');
			$c_pdf->Cell(25,8, ': Total = Rp.',0,0, 'L');
			$c_pdf->Cell(15,8, number_format($totalakhir, 0, ',', '.') ,0,1, 'L');
			$okee=0;

			$jmlTambahanHarga = 0;
			$variabel1 = null;
			$jumlah = 0;
			$hasilBulan = 0;
		}



		$c_pdf->Cell(10);
        $c_pdf->Cell(48,8, 'Jumlah Rupiah       : Rp.',0,0, 'L');
		$c_pdf->Cell(40,8, number_format($data[0]->total_awal, 0, ',', '.') ,0,1, 'L');
		    
		$c_pdf->Cell(10,10, '', 0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial', '', '12');
		$c_pdf->Cell(115,7, 'Yang Menyerahkan,',0,0, 'L');
		$c_pdf->Cell(80,7, 'Surabaya, '.$dt->format('d F Y'),0,1, 'L');
		
        $c_pdf->SetFont('Arial','','10');
		$c_pdf->Cell(10);       
        $c_pdf->Cell(140,5, 'Penerima,',0,0, 'R');
        $c_pdf->Cell(10,10,'',0,1);
        $c_pdf->Cell(10);
    
        $c_pdf->Cell(10,15,'',0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial','','12');
		$c_pdf->Cell(115,5, '('.$data[0]->nama_user.')',0,0); 
		$c_pdf->Cell(100,5, '('.$data[0]->nama.')',0,0);
		   
		$caca = "";
		$nilai = "";
		
		$c_pdf->Output();
		
    }

/////////////////////////////////////////////////////////mencetak kuintansi pdf tagihan pembayaran dengan diskon
	public function cetak_pdf_diskon(){
		$no = 1;
		$username = $this->get_cookie_decrypt("idcetak");
		$data = $this->TagihanModel->kuintansi($username);
		$bulannya = $this->TagihanModel->jmlbln($username);
		$dt = new DateTime(null, new DateTimeZone('Asia/Jakarta')); 
		$c_pdf = $this->pdf->getInstance();
		
		$abc = 0;
		$jml = 0;
		$idhasilcek = 0;
		$posisidata = 2;
		$kondisitahun = '';
		$kondisiharga ='';
		$cekondisi = '';
		

		$test = 0;

		//array data pertama
		$dataharga = array(
			array(
			'1',
			($bulannya[0]->Harga),
			($bulannya[0]->tahun),
			($bulannya[0]->bulan)
			)
		);
		
	
		//cari jumlah bulan yg diinput
		foreach($bulannya as $item) {
			$jml = $jml + 1;
		}

		//cek ad brp baris
		for($i=1; $i<$jml; $i++){
			foreach($dataharga as $ok) {
				if($ok[2] == $bulannya[$i]->tahun){					
					$kondisitahun = 'ada';
					if($ok[1] == $bulannya[$i]->Harga){					
						$kondisiharga = 'ada';
						break;
					} else {
						$kondisiharga = "taksama";
					}	
				} else {
					$kondisitahun = "taksama";
					
				}		
			}

			//input data ke array
			if($kondisiharga == 'taksama' || $kondisitahun == 'taksama'){
				$arraybaru = array(
					$posisidata,
					$bulannya[$i]->Harga,
					$bulannya[$i]->tahun,
					$bulannya[$i]->bulan					
				);
				$posisidata = $posisidata + 1;
				$abc = $abc + 1;			
				array_push($dataharga, $arraybaru);
			} else if($kondisitahun == 'ada'){
				if($kondisiharga == 'ada'){
					foreach($dataharga as $cektempat) {
						if($bulannya[$i]->tahun == $cektempat[2]){
							if($bulannya[$i]->Harga == $cektempat[1]){
								$abc = $abc + 1;			

								$arraybaru = array(
									$cektempat[0],
									$bulannya[$i]->Harga,
									$bulannya[$i]->tahun,
									$bulannya[$i]->bulan					
								);
								array_push($dataharga, $arraybaru);
							break;
							}
						}
					}
					$idhasilcek = 0;
				} else if($kondisiharga == 'taksama' && $kondisitahun== 'ada'){
					$arraybaru = array(
						$posisidata,
						$bulannya[$i]->Harga,
						$bulannya[$i]->tahun,
						$bulannya[$i]->bulan					
					);
					$posisidata = $posisidata + 1;
					$abc = $abc + 1;			
					array_push($dataharga, $arraybaru);
				}
			}

			$kondisiharga = '';
			$kondisitahun = '';
		}

		$tempsementara = array(); //array menyimpan jumlah banyak data tiap id dengan harganya, format (id, harga, jmlbulan)
		$jumlahdataharga = 0;
		$jumlahdatahargafix = 0;

		for($i=0; $i<$posisidata-1; $i++){

			for($j=0; $j<$abc+1;$j++){
				if($dataharga[$j][0] == ($i+1)){
					$jumlahdataharga = $jumlahdataharga + 1;
				}	

			}
			$arrayid = array(($i+1), $dataharga[$i][1], $jumlahdataharga);
			array_push($tempsementara, $arrayid);
			
			$jumlahdatahargafix = $jumlahdatahargafix + $jumlahdataharga;

			$jumlahdataharga = 0;


		}


		$dataJmlThnFix = array($dataharga[0][2]);

		//dapetin bnyknya tahun
		for($a=1; $a<count($dataharga); $a++){
			if($dataharga[$a][2] != $dataJmlThnFix[0]){
				if(count($dataJmlThnFix) == 1){
					array_push($dataJmlThnFix, $dataharga[$a][2]);
				} else  {
					for($b=1; $b<count($dataJmlThnFix); $b++){
						if($dataharga[$a][2] != $dataJmlThnFix[$b]){
							array_push($dataJmlThnFix, $dataharga[$a][2]);
						}
					}
				}
			}
		}

		// $variabel1 = array();
		// if($data1 != $data2){
		// 	if($variabel1 == null){
		// 		$variabel1 = $data1;
		// 	} else if($variabel1 != $data2){
		// 		array_push($variabel1, 'harga');
		// 	} 
		// }

		$SemuaDataFix = array(array());
		$Transfer = array();
		$posisiTransfer = [];
		$dataNamaBln = [];
		$pos = 0;
		$JmlBaris = 0;
		$posisiterbaru = 0;

	
		for($d=0; $d<count($dataJmlThnFix); $d++){
			for($c=0; $c<count($dataharga); $c++){
				if($dataJmlThnFix[$d] == $dataharga[$c][2]){

					$posisiTransfer[] = $c;
					$dataNamaBln[] = $dataharga[$c][3];
					
				}
			}
			for($b=0; $b<count($posisiTransfer); $b++){
				for ($a=count($posisiTransfer)-1; $a>$b; $a--){
					if ($dataharga[$posisiTransfer[$a]][3] < $dataharga[$posisiTransfer[$a-1]][3]){
						$pos = $posisiTransfer[$a-1];
						$posisiTransfer[$a-1] = $posisiTransfer[$a];
						$posisiTransfer[$a] = $pos;
					}
				}
			}
		
		

			$angkaTerkecil = min($dataNamaBln);
			$angkaTerbesar = max($dataNamaBln);
			

			$JmlBaris = $JmlBaris + 1;	


			for ($x = $angkaTerkecil; $x <= $angkaTerbesar; $x++) {
				if (! in_array($x, $dataNamaBln)) {
					$JmlBaris = $JmlBaris + 1;		
			
				} else {
					$Transfer = array(
						$dataharga[$posisiTransfer[$posisiterbaru]][0],
						$dataharga[$posisiTransfer[$posisiterbaru]][1],
						$dataharga[$posisiTransfer[$posisiterbaru]][2],
						$dataharga[$posisiTransfer[$posisiterbaru]][3],
						$JmlBaris
					);
					array_push($SemuaDataFix, $Transfer);
					$posisiterbaru = $posisiterbaru + 1;
				}
				
				
			}

	
			$posisiterbaru = 0;
			unset($posisiTransfer);
			unset($dataNamaBln);
			
		}
		
		$jumlah = 0;
		$hasilBulan = 0;
		$variabel1 = array();
		$jmlTambahanHarga = 0;


		// sort($dataharga);

		$yng = $this->terbilang($data[0]->total_setelah_diskon);

        $c_pdf = new FPDF('P', 'mm', 'A4');
        $c_pdf->AddPage();
        $c_pdf->header('Arial');
        $c_pdf->setTopMargin(15);
        $c_pdf->setLeftMargin(12);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial','', 15);
        $c_pdf->Cell(75,10,'MANAGEMENT STATE', 0,1, 'C');
        $c_pdf->SetFont('Arial', 'B', 17);
        $c_pdf->Cell(10);
		$c_pdf->Cell(190,7, 'PURI SAFIRA RESIDENCE', 0,1,'L');
        $c_pdf->SetFont('Arial', 'B', 8);
        $c_pdf->Cell(10);
		$c_pdf->Cell(75,5, 'Jl. Raya Darmo No.75-77, Surabaya',0,0, 'C');
		$c_pdf->SetFont('Arial', 'U',25);
		$c_pdf->Cell(30);
		$c_pdf->Cell(120,5, 'Tanda Terima',0,1, 'L');
		$c_pdf->SetFont('Arial', 'B',7);
		$c_pdf->Cell(10);
		$c_pdf->Cell(75,4, 'Telp. (031) 5666615, 5666616',0,1, 'C');
	   		
		$c_pdf->Line(15, 40, 220-25, 40);
        $c_pdf->Line(15, 40, 220-25, 40);
        $c_pdf->Line(15, 40, 220-25, 40);

        $c_pdf->Cell(10,8, '', 0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial', '', 12);
        $c_pdf->Cell(40,8,'Sudah Terima dari :' ,0,0, 'L');
		$c_pdf->Cell(55,8, $data[0]->nama ,0,0, 'L');

		$c_pdf->Cell(14,8,'Type: ',0,0,'L');
		$c_pdf->Cell(20,8, $data[0]->type ,0,0,'L');
		$c_pdf->Cell(14,8,'Blok:',0,0,'L');
		$c_pdf->Cell(20,8, $data[0]->IDBlok,0,1,'L'); 

		$c_pdf->Cell(10);
        $c_pdf->Cell(40,8, 'Terbilang                :',0,0, 'L');
        $c_pdf->Cell(40,8, $yng,0,1, 'L');
        
		$c_pdf->Cell(10);
        $c_pdf->Cell(40,8, 'Untuk Pembayaran:',0,0, 'L');
        $c_pdf->Cell(40,8, 'IURAN MANAGEMENT ESTATE',0,1, 'L');

		$c_pdf->Cell(50);
		$c_pdf->Cell(16,8, 'Bulan :',0,0, 'L');
		$c_pdf->Cell(40,8, '' ,0,1, 'L');

		for($p=1; $p<$JmlBaris+1; $p++){
			for($q=1; $q<count($SemuaDataFix); $q++){			

				if($p == $SemuaDataFix[$q][4]){
					$jumlah = $jumlah + 1;
					$hasilBulan = $q;
				}

				
			}

			
	

			//print hasilnya (arrray[0][1] = harga, arrray[0][2] = tahun, arrray[0][3] = bulan(dlm angka), arrray[0][4] = jenis pisahnya, )
			if($jumlah == 1){
				$namabulan = $this->switch_bulan($SemuaDataFix[$hasilBulan][3]).' '.$SemuaDataFix[$hasilBulan][2];
				$HrgBln = $SemuaDataFix[$hasilBulan][1];
				$totalakhir = $jumlah * $HrgBln;
			}else {
				$namabulan = $this->switch_bulan($SemuaDataFix[$hasilBulan-($jumlah-1)][3]).' - '.$this->switch_bulan($SemuaDataFix[$hasilBulan][3]).' '.$SemuaDataFix[$hasilBulan][2];
				$HrgBln = $SemuaDataFix[$hasilBulan][1];
				$totalakhir = $jumlah * $HrgBln;
			}

			

			$c_pdf->Cell(50);
			$c_pdf->Cell(55,8, $namabulan ,0,0, 'L');
			$c_pdf->Cell(7,8, ': '.$jumlah ,0,0, 'L');
			$c_pdf->Cell(22,8, 'bulan x Rp.',0,0, 'L');
			$c_pdf->Cell(14,8,  $HrgBln ,0,0, 'L');
			$c_pdf->Cell(25,8, ': Total = Rp.',0,0, 'L');
			$c_pdf->Cell(15,8, number_format($totalakhir, 0, ',', '.') ,0,1, 'L');
			$okee=0;

			$jmlTambahanHarga = 0;
			$variabel1 = null;
			$jumlah = 0;
			$hasilBulan = 0;
		}

		$c_pdf->Cell(10);
        $c_pdf->Cell(48,8, 'Total diskon            : Rp.',0,0, 'L');
		$c_pdf->Cell(40,8, number_format($data[0]->diskon, 0, ',', '.') ,0,1, 'L');

		$c_pdf->Cell(10);
        $c_pdf->Cell(40,8, 'Keterangan             :',0,0, 'L');
		$c_pdf->MultiCell(100,8, $data[0]->keterangan_diskon ,0, 'L');

		$c_pdf->Cell(10);
        $c_pdf->Cell(48,8, 'Jumlah Rupiah       : Rp.',0,0, 'L');
		$c_pdf->Cell(40,8, number_format($data[0]->total_setelah_diskon, 0, ',', '.') ,0,1, 'L');	
        
		$c_pdf->Cell(10,10, '', 0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial', '', '12');
		$c_pdf->Cell(115,7, 'Yang Menyerahkan,',0,0, 'L');
		$c_pdf->Cell(80,7, 'Surabaya, '.$dt->format('d F Y'),0,1, 'L');
		
        $c_pdf->SetFont('Arial','','10');
		$c_pdf->Cell(10);       
        $c_pdf->Cell(140,5, 'Penerima,',0,0, 'R');
        $c_pdf->Cell(10,10,'',0,1);
        $c_pdf->Cell(10);
    
        $c_pdf->Cell(10,15,'',0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial','','12');
		$c_pdf->Cell(115,5, '('.$data[0]->nama_user.')',0,0); 
		$c_pdf->Cell(100,5, '('.$data[0]->nama.')',0,0);
		   
		$caca = "";
		$nilai = "";
          
		$c_pdf->Output();
		
    }
	
////////////////////////////////////////////////////////// mencetak pdf pada tagihan
	public function cetak_pdf_now(){
		$username = $this->get_cookie_decrypt("idpdf");
		$blok = $this->get_cookie_decrypt("idblok");
		$data = $this->TagihanModel->pdf_now($username);
		$bulannya = $this->TagihanModel->jmlblnpdf($username);
		$namauser = $this->StaffModel->get_user_pdf($blok);
		$dt = new DateTime(null, new DateTimeZone('Asia/Jakarta')); 
		$c_pdf = $this->pdf->getInstance();
		$hargatotal = 0;
		$namastaff = str_replace('"', "",json_encode($namauser[0]["nama_user"]));

		$no = 1;
		$abc = 0;
		$jml = 0;
		$idhasilcek = 0;
		$posisidata = 2;
		$kondisitahun = '';
		$kondisiharga ='';
		$cekondisi = '';
		

		$test = 0;


		foreach($bulannya as $jmlharga){
			if($jmlharga->status == '0'){
				$hargatotal = $hargatotal + $jmlharga->Harga;
			}
		}

		//array data pertama
		$dataharga = array(
			array(
			'1',
			($bulannya[0]->Harga),
			($bulannya[0]->tahun),
			($bulannya[0]->bulan),
			($bulannya[0]->status)
			)
		);
		
	
		//cari jumlah bulan yg diinput
		foreach($bulannya as $item) {
			$jml = $jml + 1;
		}

		//cek ad brp baris
		for($i=1; $i<$jml; $i++){
			if($bulannya[$i]->status == '0') {
				$no = $no+1;

				foreach($dataharga as $ok) {
					if($ok[2] == $bulannya[$i]->tahun){					
						$kondisitahun = 'ada';
						if($ok[1] == $bulannya[$i]->Harga){					
							$kondisiharga = 'ada';
							break;
						} else {
							$kondisiharga = "taksama";
						}	
					} else {
						$kondisitahun = "taksama";
						
					}		
				}

				//input data ke array
				if($kondisiharga == 'taksama' || $kondisitahun == 'taksama'){
					$arraybaru = array(
						$posisidata,
						$bulannya[$i]->Harga,
						$bulannya[$i]->tahun,
						$bulannya[$i]->bulan,
						$bulannya[$i]->status				
					);
					$posisidata = $posisidata + 1;
					$abc = $abc + 1;			
					array_push($dataharga, $arraybaru);
				} else if($kondisitahun == 'ada'){
					if($kondisiharga == 'ada'){
						foreach($dataharga as $cektempat) {
							if($bulannya[$i]->tahun == $cektempat[2]){
								if($bulannya[$i]->Harga == $cektempat[1]){
									$abc = $abc + 1;			

									$arraybaru = array(
										$cektempat[0],
										$bulannya[$i]->Harga,
										$bulannya[$i]->tahun,
										$bulannya[$i]->bulan,
										$bulannya[$i]->status									
									);
									array_push($dataharga, $arraybaru);
								break;
								}
							}
						}
						$idhasilcek = 0;
					} else if($kondisiharga == 'taksama' && $kondisitahun== 'ada'){
						$arraybaru = array(
							$posisidata,
							$bulannya[$i]->Harga,
							$bulannya[$i]->tahun,
							$bulannya[$i]->bulan,
							$bulannya[$i]->status									
						);
						$posisidata = $posisidata + 1;
						$abc = $abc + 1;			
						array_push($dataharga, $arraybaru);
					}
				}

			}
			$kondisiharga = '';
			$kondisitahun = '';
		}

		$tempsementara = array(); //array menyimpan jumlah banyak data tiap id dengan harganya, format (id, harga, jmlbulan)
		$jumlahdataharga = 0;
		$jumlahdatahargafix = 0;

		for($i=0; $i<$posisidata-1; $i++){

			for($j=0; $j<$abc+1;$j++){
				if($dataharga[$j][0] == ($i+1)){
					$jumlahdataharga = $jumlahdataharga + 1;
				}	

			}
			$arrayid = array(($i+1), $dataharga[$i][1], $jumlahdataharga);
			array_push($tempsementara, $arrayid);
			
			$jumlahdatahargafix = $jumlahdatahargafix + $jumlahdataharga;

			$jumlahdataharga = 0;


		}

		
		$dataJmlThnFix = array($dataharga[0][2]);

		//dapetin bnyknya tahun
		for($a=1; $a<count($dataharga); $a++){
			if($dataharga[$a][2] != $dataJmlThnFix[0]){
				if(count($dataJmlThnFix) == 1){
					array_push($dataJmlThnFix, $dataharga[$a][2]);
				} else  {
					for($b=1; $b<count($dataJmlThnFix); $b++){
						if($dataharga[$a][2] != $dataJmlThnFix[$b]){
							array_push($dataJmlThnFix, $dataharga[$a][2]);
						}
					}
				}
			}
		}

		// $variabel1 = array();
		// if($data1 != $data2){
		// 	if($variabel1 == null){
		// 		$variabel1 = $data1;
		// 	} else if($variabel1 != $data2){
		// 		array_push($variabel1, 'harga');
		// 	} 
		// }

		$SemuaDataFix = array(array());
		$Transfer = array();
		$posisiTransfer = [];
		$dataNamaBln = [];
		$pos = 0;
		$JmlBaris = 0;
		$posisiterbaru = 0;

	
		for($d=0; $d<count($dataJmlThnFix); $d++){
			for($c=0; $c<count($dataharga); $c++){
				if($dataJmlThnFix[$d] == $dataharga[$c][2]){

					$posisiTransfer[] = $c;
					$dataNamaBln[] = $dataharga[$c][3];
					
				}
			}
			for($b=0; $b<count($posisiTransfer); $b++){
				for ($a=count($posisiTransfer)-1; $a>$b; $a--){
					if ($dataharga[$posisiTransfer[$a]][3] < $dataharga[$posisiTransfer[$a-1]][3]){
						$pos = $posisiTransfer[$a-1];
						$posisiTransfer[$a-1] = $posisiTransfer[$a];
						$posisiTransfer[$a] = $pos;
					}
				}
			}
		
		

			$angkaTerkecil = min($dataNamaBln);
			$angkaTerbesar = max($dataNamaBln);
			

			$JmlBaris = $JmlBaris + 1;	


			for ($x = $angkaTerkecil; $x <= $angkaTerbesar; $x++) {
				if (! in_array($x, $dataNamaBln)) {
					$JmlBaris = $JmlBaris + 1;		
			
				} else {
					$Transfer = array(
						$dataharga[$posisiTransfer[$posisiterbaru]][0],
						$dataharga[$posisiTransfer[$posisiterbaru]][1],
						$dataharga[$posisiTransfer[$posisiterbaru]][2],
						$dataharga[$posisiTransfer[$posisiterbaru]][3],
						$JmlBaris
					);
					array_push($SemuaDataFix, $Transfer);
					$posisiterbaru = $posisiterbaru + 1;
				}
				
				
			}

	
			$posisiterbaru = 0;
			unset($posisiTransfer);
			unset($dataNamaBln);
			
		}
		
		$jumlah = 0;
		$hasilBulan = 0;
		$variabel1 = array();
		$jmlTambahanHarga = 0;

		// sort($dataharga);

		$yng = $this->terbilang($hargatotal);


        $c_pdf = new FPDF('P', 'mm', 'A4');
        $c_pdf->AddPage();
        $c_pdf->header('Arial');
        $c_pdf->setTopMargin(15);
        $c_pdf->setLeftMargin(12);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial','', 15);
        $c_pdf->Cell(75,10,'MANAGEMENT STATE', 0,1, 'C');
        $c_pdf->SetFont('Arial', 'B', 17);
        $c_pdf->Cell(10);
		$c_pdf->Cell(190,7, 'PURI SAFIRA RESIDENCE', 0,1,'L');
        $c_pdf->SetFont('Arial', 'B', 8);
        $c_pdf->Cell(10);
		$c_pdf->Cell(75,5, 'Jl. Raya Darmo No.75-77, Surabaya',0,0, 'C');
		$c_pdf->SetFont('Arial', 'U',25);
		$c_pdf->Cell(30);
		$c_pdf->Cell(120,5, 'Tanda Terima',0,1, 'L');
		$c_pdf->SetFont('Arial', 'B',7);
		$c_pdf->Cell(10);
		$c_pdf->Cell(75,4, 'Telp. (031) 5666615, 5666616',0,1, 'C');
	   		
		$c_pdf->Line(15, 40, 220-25, 40);
        $c_pdf->Line(15, 40, 220-25, 40);
        $c_pdf->Line(15, 40, 220-25, 40);

        $c_pdf->Cell(10,8, '', 0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial', '', 12);
        $c_pdf->Cell(40,8,'Sudah Terima dari :' ,0,0, 'L');
		$c_pdf->Cell(55,8, $data[0]->nama ,0,0, 'L');

		$c_pdf->Cell(14,8,'Type: ',0,0,'L');
		$c_pdf->Cell(20,8, $data[0]->type ,0,0,'L');
		$c_pdf->Cell(14,8,'Blok:',0,0,'L');
		$c_pdf->Cell(20,8, $bulannya[0]->IDBlok,0,1,'L'); 

		$c_pdf->Cell(10);
        $c_pdf->Cell(40,8, 'Terbilang                :',0,0, 'L');
        $c_pdf->Cell(40,8, $yng,0,1, 'L');
        
		$c_pdf->Cell(10);
        $c_pdf->Cell(40,8, 'Untuk Pembayaran:',0,0, 'L');
        $c_pdf->Cell(40,8, 'IURAN MANAGEMENT ESTATE',0,1, 'L');

		$c_pdf->Cell(50);
		$c_pdf->Cell(16,8, 'Bulan :',0,0, 'L');
		$c_pdf->Cell(40,8, '' ,0,1, 'L');

		for($p=1; $p<$JmlBaris+1; $p++){
			for($q=1; $q<count($SemuaDataFix); $q++){			

				if($p == $SemuaDataFix[$q][4]){
					$jumlah = $jumlah + 1;
					$hasilBulan = $q;
				}

				
			}

			
	

			//print hasilnya (arrray[0][1] = harga, arrray[0][2] = tahun, arrray[0][3] = bulan(dlm angka), arrray[0][4] = jenis pisahnya, )
			if($jumlah == 1){
				$namabulan = $this->switch_bulan($SemuaDataFix[$hasilBulan][3]).' '.$SemuaDataFix[$hasilBulan][2];
				$HrgBln = $SemuaDataFix[$hasilBulan][1];
				$totalakhir = $jumlah * $HrgBln;
			}else {
				$namabulan = $this->switch_bulan($SemuaDataFix[$hasilBulan-($jumlah-1)][3]).' - '.$this->switch_bulan($SemuaDataFix[$hasilBulan][3]).' '.$SemuaDataFix[$hasilBulan][2];
				$HrgBln = $SemuaDataFix[$hasilBulan][1];
				$totalakhir = $jumlah * $HrgBln;
			}

			

			$c_pdf->Cell(50);
			$c_pdf->Cell(55,8, $namabulan ,0,0, 'L');
			$c_pdf->Cell(7,8, ': '.$jumlah ,0,0, 'L');
			$c_pdf->Cell(22,8, 'bulan x Rp.',0,0, 'L');
			$c_pdf->Cell(14,8,  $HrgBln ,0,0, 'L');
			$c_pdf->Cell(25,8, ': Total = Rp.',0,0, 'L');
			$c_pdf->Cell(15,8, number_format($totalakhir, 0, ',', '.') ,0,1, 'L');
			$okee=0;

			$jmlTambahanHarga = 0;
			$variabel1 = null;
			$jumlah = 0;
			$hasilBulan = 0;
		}
		

		$c_pdf->Cell(10);
        $c_pdf->Cell(48,8, 'Jumlah Rupiah       : Rp.',0,0, 'L');
		$c_pdf->Cell(40,8, number_format($hargatotal, 0, ',', '.'),0,1, 'L');
		    
		$c_pdf->Cell(10,10, '', 0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial', '', '12');
		$c_pdf->Cell(115,7, 'Yang Menyerahkan,',0,0, 'L');
		$c_pdf->Cell(80,7, 'Surabaya, '.$dt->format('d F Y'),0,1, 'L');
		
        $c_pdf->SetFont('Arial','','10');
		$c_pdf->Cell(10);       
        $c_pdf->Cell(140,5, 'Penerima,',0,0, 'R');
        $c_pdf->Cell(10,10,'',0,1);
        $c_pdf->Cell(10);
    
        $c_pdf->Cell(10,15,'',0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial','','12');
		$c_pdf->Cell(115,5, '('.$namastaff.')',0,0); 
		$c_pdf->Cell(100,5, '('.$data[0]->nama.')',0,0);
		   
		$caca = "";
		$nilai = "";
		
		$c_pdf->Output();
		
	}

/////////////////////////////////////////////////////////////mencetak kuintansi pdf tagihan pembayaran di arsip
	public function cetak_pdf_arsip(){
		$no = 1;
		$username = $this->get_cookie_decrypt("idcetak");
		$data = $this->TagihanModel->kuintansi($username);
		$bulannya = $this->TagihanModel->jmlbln($username);
		$dt = new DateTime(null, new DateTimeZone('Asia/Jakarta')); 
		$c_pdf = $this->pdf->getInstance();

		$abc = 0;
		$jml = 0;
		$idhasilcek = 0;
		$posisidata = 2;
		$kondisitahun = '';
		$kondisiharga ='';
		$cekondisi = '';
		$test = 0;

		$blnbayar = $this->switch_bulan(substr($data[0]->tanggal, 5, 2));
		$thnbayar = substr($data[0]->tanggal, 0, 4);
		$tglbayar = substr($data[0]->tanggal, 8, 3);
		
		//array data pertama
		$dataharga = array(
			array(
			'1',
			($bulannya[0]->Harga),
			($bulannya[0]->tahun),
			($bulannya[0]->bulan)
			)
		);

		//array data pertama
		$notfix = array(
			array(
			'0',
			'0',
			'0',
			'0'
			)
		);
		
	
		//cari jumlah bulan yg diinput
		foreach($bulannya as $item) {
			$jml = $jml + 1;
		}

		//cek ad brp baris
		for($i=1; $i<$jml; $i++){
			foreach($dataharga as $ok) {
				if($ok[2] == $bulannya[$i]->tahun){					
					$kondisitahun = 'ada';
					if($ok[1] == $bulannya[$i]->Harga){					
						$kondisiharga = 'ada';
						break;
					} else {
						$kondisiharga = "taksama";
					}	
				} else {
					$kondisitahun = "taksama";
					
				}		
			}

  			//input data ke array
			if($kondisiharga == 'taksama' || $kondisitahun == 'taksama'){
				$arraybaru = array(
					$posisidata,
					$bulannya[$i]->Harga,
					$bulannya[$i]->tahun,
					$bulannya[$i]->bulan					
				);
				$posisidata = $posisidata + 1;
				$abc = $abc + 1;			
				array_push($dataharga, $arraybaru);
			} else if($kondisitahun == 'ada'){
				if($kondisiharga == 'ada'){
					foreach($dataharga as $cektempat) {
						if($bulannya[$i]->tahun == $cektempat[2]){
							if($bulannya[$i]->Harga == $cektempat[1]){
								$abc = $abc + 1;			

								$arraybaru = array(
									$cektempat[0],
									$bulannya[$i]->Harga,
									$bulannya[$i]->tahun,
									$bulannya[$i]->bulan					
								);
								array_push($dataharga, $arraybaru);
							break;
							}
						}
					}
					$idhasilcek = 0;
				} else if($kondisiharga == 'taksama' && $kondisitahun== 'ada'){
					$arraybaru = array(
						$posisidata,
						$bulannya[$i]->Harga,
						$bulannya[$i]->tahun,
						$bulannya[$i]->bulan					
					);
					$posisidata = $posisidata + 1;
					$abc = $abc + 1;			
					array_push($dataharga, $arraybaru);
				}
			}

			$kondisiharga = '';
			$kondisitahun = '';
		}

		// $tempsementara = array(); //array menyimpan jumlah banyak data tiap id dengan harganya, format (id, harga, jmlbulan)
		// $jumlahdataharga = 0;
		// $jumlahdatahargafix = 0;


		// for($i=0; $i<$posisidata-1; $i++){

		// 	for($j=0; $j<$abc+1;$j++){
		// 		if($dataharga[$j][0] == ($i+1)){
		// 			$jumlahdataharga = $jumlahdataharga + 1;
		// 		}	

		// 	}
		// 	$arrayid = array(($i+1), $dataharga[$i][1], $jumlahdataharga);
		// 	array_push($tempsementara, $arrayid);
			
		// 	$jumlahdatahargafix = $jumlahdatahargafix + $jumlahdataharga;

		// 	$jumlahdataharga = 0;


		// }


		$dataJmlThnFix = array($dataharga[0][2]);

		//dapetin bnyknya tahun
		for($a=1; $a<count($dataharga); $a++){
			if($dataharga[$a][2] != $dataJmlThnFix[0]){
				if(count($dataJmlThnFix) == 1){
					array_push($dataJmlThnFix, $dataharga[$a][2]);
				} else  {
					for($b=1; $b<count($dataJmlThnFix); $b++){
						if($dataharga[$a][2] != $dataJmlThnFix[$b]){
							array_push($dataJmlThnFix, $dataharga[$a][2]);
						}
					}
				}
			}
		}

		// $variabel1 = array();
		// if($data1 != $data2){
		// 	if($variabel1 == null){
		// 		$variabel1 = $data1;
		// 	} else if($variabel1 != $data2){
		// 		array_push($variabel1, 'harga');
		// 	} 
		// }

		$SemuaDataFix = array(array());
		$Transfer = array();
		$posisiTransfer = [];
		$dataNamaBln = [];
		$pos = 0;
		$JmlBaris = 0;
		$posisiterbaru = 0;

	
		for($d=0; $d<count($dataJmlThnFix); $d++){
			for($c=0; $c<count($dataharga); $c++){
				if($dataJmlThnFix[$d] == $dataharga[$c][2]){

					$posisiTransfer[] = $c;
					$dataNamaBln[] = $dataharga[$c][3];
					
				}
			}
			for($b=0; $b<count($posisiTransfer); $b++){
				for ($a=count($posisiTransfer)-1; $a>$b; $a--){
					if ($dataharga[$posisiTransfer[$a]][3] < $dataharga[$posisiTransfer[$a-1]][3]){
						$pos = $posisiTransfer[$a-1];
						$posisiTransfer[$a-1] = $posisiTransfer[$a];
						$posisiTransfer[$a] = $pos;
					}
				}
			}
		
		

			$angkaTerkecil = min($dataNamaBln);
			$angkaTerbesar = max($dataNamaBln);
			

			$JmlBaris = $JmlBaris + 1;	


			for ($x = $angkaTerkecil; $x <= $angkaTerbesar; $x++) {
				if (! in_array($x, $dataNamaBln)) {
					$JmlBaris = $JmlBaris + 1;		
			
				} else {
					$Transfer = array(
						$dataharga[$posisiTransfer[$posisiterbaru]][0],
						$dataharga[$posisiTransfer[$posisiterbaru]][1],
						$dataharga[$posisiTransfer[$posisiterbaru]][2],
						$dataharga[$posisiTransfer[$posisiterbaru]][3],
						$JmlBaris
					);
					array_push($SemuaDataFix, $Transfer);
					$posisiterbaru = $posisiterbaru + 1;
				}
				
				
			}

	
			$posisiterbaru = 0;
			unset($posisiTransfer);
			unset($dataNamaBln);
			
		}
		
		$jumlah = 0;
		$hasilBulan = 0;
		$variabel1 = array();
		$jmlTambahanHarga = 0;


		


		$yng = $this->terbilang($data[0]->total_awal);

        $c_pdf = new FPDF('P', 'mm', 'A4');
        $c_pdf->AddPage();
        $c_pdf->header('Arial');
        $c_pdf->setTopMargin(15);
        $c_pdf->setLeftMargin(12);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial','', 15);
        $c_pdf->Cell(75,10,'MANAGEMENT STATE', 0,1, 'C');
        $c_pdf->SetFont('Arial', 'B', 17);
        $c_pdf->Cell(10);
		$c_pdf->Cell(190,7, 'PURI SAFIRA RESIDENCE', 0,1,'L');
        $c_pdf->SetFont('Arial', 'B', 8);
        $c_pdf->Cell(10);
		$c_pdf->Cell(75,5, 'Jl. Raya Darmo No.75-77, Surabaya',0,0, 'C');
		$c_pdf->SetFont('Arial', 'U',25);
		$c_pdf->Cell(30);
		$c_pdf->Cell(120,5, 'Tanda Terima',0,1, 'L');
		$c_pdf->SetFont('Arial', 'B',7);
		$c_pdf->Cell(10);
		$c_pdf->Cell(75,4, 'Telp. (031) 5666615, 5666616',0,1, 'C');
	   		
		$c_pdf->Line(15, 40, 220-25, 40);
        $c_pdf->Line(15, 40, 220-25, 40);
        $c_pdf->Line(15, 40, 220-25, 40);

        $c_pdf->Cell(10,8, '', 0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial', '', 12);
        $c_pdf->Cell(40,8,'Sudah Terima dari :' ,0,0, 'L');
		$c_pdf->Cell(55,8, $data[0]->nama ,0,0, 'L');

		$c_pdf->Cell(14,8,'Type: ',0,0,'L');
		$c_pdf->Cell(20,8, $data[0]->type ,0,0,'L');
		$c_pdf->Cell(14,8,'Blok:',0,0,'L');
		$c_pdf->Cell(20,8, $data[0]->IDBlok,0,1,'L'); 

		$c_pdf->Cell(10);
        $c_pdf->Cell(40,8, 'Terbilang                :',0,0, 'L');
        $c_pdf->Cell(40,8, $yng,0,1, 'L');
        
		$c_pdf->Cell(10);
        $c_pdf->Cell(40,8, 'Untuk Pembayaran:',0,0, 'L');
        $c_pdf->Cell(40,8, 'IURAN MANAGEMENT ESTATE',0,1, 'L');

		$c_pdf->Cell(50);
		$c_pdf->Cell(16,8, 'Bulan :',0,0, 'L');
		$c_pdf->Cell(40,8, '' ,0,1, 'L');

		// $okee = 0;

		// for($t=1; $t<$posisidata; $t++){
		// 	for($r=0; $r<$jml; $r++){
		// 		if($dataharga[$r][0] == $t){
		// 			$ihi = $this->switch_bulan($dataharga[$r][3]);
		// 			$thn = $dataharga[$r][2];
		// 			$okee = $okee + 1;				
		// 		}
		// 	}


		// 	for($p=0; $p<$jml; $p++){
		// 		if($dataharga[$p][0] == $t){
		// 			$aha = $this->switch_bulan($dataharga[$p][3]);
		// 		break;
		// 		}
		// 	}

		// 	$totalakhir = $okee * $dataharga[$t-1][1];
		// 	$namabulan;

		// 	if($okee == 1){
		// 		$namabulan = str_replace('"', "",json_encode($aha)).' '.$thn; 
		// 	} else {
		// 		$namabulan = str_replace('"', "",json_encode($aha)).'-'.str_replace('"', "",json_encode($ihi)).' '.$thn; 
		// 	}


			// $c_pdf->Cell(50);
			// $c_pdf->Cell(55,8, $aha ,0,0, 'L');
			// $c_pdf->Cell(7,8, ': '.$okee ,0,0, 'L');
			// $c_pdf->Cell(22,8, 'bulan x Rp.',0,0, 'L');
			// $c_pdf->Cell(14,8,  number_format(str_replace('"', "",json_encode($dataharga[$t-1][1])), 0, ',', '.') ,0,0, 'L');
			// $c_pdf->Cell(25,8, ': Total = Rp.',0,0, 'L');
			// $c_pdf->Cell(15,8, number_format($totalakhir, 0, ',', '.') ,0,1, 'L');
			// $okee=0;
		// }


		for($p=1; $p<$JmlBaris+1; $p++){
			for($q=1; $q<count($SemuaDataFix); $q++){			

				if($p == $SemuaDataFix[$q][4]){
					$jumlah = $jumlah + 1;
					$hasilBulan = $q;
				}

				
			}

			
	

			//print hasilnya (arrray[0][1] = harga, arrray[0][2] = tahun, arrray[0][3] = bulan(dlm angka), arrray[0][4] = jenis pisahnya, )
			if($jumlah == 1){
				$namabulan = $this->switch_bulan($SemuaDataFix[$hasilBulan][3]).' '.$SemuaDataFix[$hasilBulan][2];
				$HrgBln = $SemuaDataFix[$hasilBulan][1];
				$totalakhir = $jumlah * $HrgBln;
			}else {
				$namabulan = $this->switch_bulan($SemuaDataFix[$hasilBulan-($jumlah-1)][3]).' - '.$this->switch_bulan($SemuaDataFix[$hasilBulan][3]).' '.$SemuaDataFix[$hasilBulan][2];
				$HrgBln = $SemuaDataFix[$hasilBulan][1];
				$totalakhir = $jumlah * $HrgBln;
			}

			

			$c_pdf->Cell(50);
			$c_pdf->Cell(55,8, $namabulan ,0,0, 'L');
			$c_pdf->Cell(7,8, ': '.$jumlah ,0,0, 'L');
			$c_pdf->Cell(22,8, 'bulan x Rp.',0,0, 'L');
			$c_pdf->Cell(14,8,  $HrgBln ,0,0, 'L');
			$c_pdf->Cell(25,8, ': Total = Rp.',0,0, 'L');
			$c_pdf->Cell(15,8, number_format($totalakhir, 0, ',', '.') ,0,1, 'L');
			$okee=0;

			$jmlTambahanHarga = 0;
			$variabel1 = null;
			$jumlah = 0;
			$hasilBulan = 0;
		}


		$c_pdf->Cell(10);
        $c_pdf->Cell(48,8, 'Jumlah Rupiah       : Rp.',0,0, 'L');
		$c_pdf->Cell(40,8, number_format($data[0]->total_awal, 0, ',', '.') ,0,1, 'L');
		    
		$c_pdf->Cell(10,10, '', 0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial', '', '12');
		$c_pdf->Cell(115,7, 'Yang Menyerahkan,',0,0, 'L');
		$c_pdf->Cell(80,7, 'Surabaya, '.$tglbayar.' '.$blnbayar.' ' .$thnbayar,0,1, 'L');
		
        $c_pdf->SetFont('Arial','','10');
		$c_pdf->Cell(10);       
        $c_pdf->Cell(140,5, 'Penerima,',0,0, 'R');
        $c_pdf->Cell(10,10,'',0,1);
        $c_pdf->Cell(10);
    
        $c_pdf->Cell(10,15,'',0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial','','12');
		$c_pdf->Cell(115,5, '('.$data[0]->nama_user.')',0,0); 
		$c_pdf->Cell(100,5, '('.$data[0]->nama.')',0,0);
		   
		$caca = "";
		$nilai = "";
		
		$c_pdf->Output();
		
    }

/////////////////////////////////////////////////////////mencetak kuintansi pdf tagihan pembayaran dengan diskon di arsip
	public function cetak_pdf_diskon_arsip(){
		$no = 1;
		$username = $this->get_cookie_decrypt("idcetak");
		$data = $this->TagihanModel->kuintansi($username);
		$bulannya = $this->TagihanModel->jmlbln($username);
		$dt = new DateTime(null, new DateTimeZone('Asia/Jakarta')); 
		$c_pdf = $this->pdf->getInstance();
		
		$abc = 0;
		$jml = 0;
		$idhasilcek = 0;
		$posisidata = 2;
		$kondisitahun = '';
		$kondisiharga ='';
		$cekondisi = '';
		$test = 0;

		$blnbayar = $this->switch_bulan(substr($data[0]->tanggal, 5, 2));
		$thnbayar = substr($data[0]->tanggal, 0, 4);
		$tglbayar = substr($data[0]->tanggal, 8, 3);

		//array data pertama
		$dataharga = array(
			array(
			'1',
			($bulannya[0]->Harga),
			($bulannya[0]->tahun),
			($bulannya[0]->bulan)
			)
		);
		
	
		//cari jumlah bulan yg diinput
		foreach($bulannya as $item) {
			$jml = $jml + 1;
		}

		//cek ad brp baris
		for($i=1; $i<$jml; $i++){
			foreach($dataharga as $ok) {
				if($ok[2] == $bulannya[$i]->tahun){					
					$kondisitahun = 'ada';
					if($ok[1] == $bulannya[$i]->Harga){					
						$kondisiharga = 'ada';
						break;
					} else {
						$kondisiharga = "taksama";
					}	
				} else {
					$kondisitahun = "taksama";
					
				}		
			}

			//input data ke array
			if($kondisiharga == 'taksama' || $kondisitahun == 'taksama'){
				$arraybaru = array(
					$posisidata,
					$bulannya[$i]->Harga,
					$bulannya[$i]->tahun,
					$bulannya[$i]->bulan					
				);
				$posisidata = $posisidata + 1;
				$abc = $abc + 1;			
				array_push($dataharga, $arraybaru);
			} else if($kondisitahun == 'ada'){
				if($kondisiharga == 'ada'){
					foreach($dataharga as $cektempat) {
						if($bulannya[$i]->tahun == $cektempat[2]){
							if($bulannya[$i]->Harga == $cektempat[1]){
								$abc = $abc + 1;			

								$arraybaru = array(
									$cektempat[0],
									$bulannya[$i]->Harga,
									$bulannya[$i]->tahun,
									$bulannya[$i]->bulan					
								);
								array_push($dataharga, $arraybaru);
							break;
							}
						}
					}
					$idhasilcek = 0;
				} else if($kondisiharga == 'taksama' && $kondisitahun== 'ada'){
					$arraybaru = array(
						$posisidata,
						$bulannya[$i]->Harga,
						$bulannya[$i]->tahun,
						$bulannya[$i]->bulan					
					);
					$posisidata = $posisidata + 1;
					$abc = $abc + 1;			
					array_push($dataharga, $arraybaru);
				}
			}

			$kondisiharga = '';
			$kondisitahun = '';
		}

		$tempsementara = array(); //array menyimpan jumlah banyak data tiap id dengan harganya, format (id, harga, jmlbulan)
		$jumlahdataharga = 0;
		$jumlahdatahargafix = 0;

		for($i=0; $i<$posisidata-1; $i++){

			for($j=0; $j<$abc+1;$j++){
				if($dataharga[$j][0] == ($i+1)){
					$jumlahdataharga = $jumlahdataharga + 1;
				}	

			}
			$arrayid = array(($i+1), $dataharga[$i][1], $jumlahdataharga);
			array_push($tempsementara, $arrayid);
			
			$jumlahdatahargafix = $jumlahdatahargafix + $jumlahdataharga;

			$jumlahdataharga = 0;


		}

		
		$dataJmlThnFix = array($dataharga[0][2]);

		//dapetin bnyknya tahun
		for($a=1; $a<count($dataharga); $a++){
			if($dataharga[$a][2] != $dataJmlThnFix[0]){
				if(count($dataJmlThnFix) == 1){
					array_push($dataJmlThnFix, $dataharga[$a][2]);
				} else  {
					for($b=1; $b<count($dataJmlThnFix); $b++){
						if($dataharga[$a][2] != $dataJmlThnFix[$b]){
							array_push($dataJmlThnFix, $dataharga[$a][2]);
						}
					}
				}
			}
		}

		// $variabel1 = array();
		// if($data1 != $data2){
		// 	if($variabel1 == null){
		// 		$variabel1 = $data1;
		// 	} else if($variabel1 != $data2){
		// 		array_push($variabel1, 'harga');
		// 	} 
		// }

		$SemuaDataFix = array(array());
		$Transfer = array();
		$posisiTransfer = [];
		$dataNamaBln = [];
		$pos = 0;
		$JmlBaris = 0;
		$posisiterbaru = 0;

	
		for($d=0; $d<count($dataJmlThnFix); $d++){
			for($c=0; $c<count($dataharga); $c++){
				if($dataJmlThnFix[$d] == $dataharga[$c][2]){

					$posisiTransfer[] = $c;
					$dataNamaBln[] = $dataharga[$c][3];
					
				}
			}
			for($b=0; $b<count($posisiTransfer); $b++){
				for ($a=count($posisiTransfer)-1; $a>$b; $a--){
					if ($dataharga[$posisiTransfer[$a]][3] < $dataharga[$posisiTransfer[$a-1]][3]){
						$pos = $posisiTransfer[$a-1];
						$posisiTransfer[$a-1] = $posisiTransfer[$a];
						$posisiTransfer[$a] = $pos;
					}
				}
			}
		
		

			$angkaTerkecil = min($dataNamaBln);
			$angkaTerbesar = max($dataNamaBln);
			

			$JmlBaris = $JmlBaris + 1;	


			for ($x = $angkaTerkecil; $x <= $angkaTerbesar; $x++) {
				if (! in_array($x, $dataNamaBln)) {
					$JmlBaris = $JmlBaris + 1;		
			
				} else {
					$Transfer = array(
						$dataharga[$posisiTransfer[$posisiterbaru]][0],
						$dataharga[$posisiTransfer[$posisiterbaru]][1],
						$dataharga[$posisiTransfer[$posisiterbaru]][2],
						$dataharga[$posisiTransfer[$posisiterbaru]][3],
						$JmlBaris
					);
					array_push($SemuaDataFix, $Transfer);
					$posisiterbaru = $posisiterbaru + 1;
				}
				
				
			}

	
			$posisiterbaru = 0;
			unset($posisiTransfer);
			unset($dataNamaBln);
			
		}
		
		$jumlah = 0;
		$hasilBulan = 0;
		$variabel1 = array();
		$jmlTambahanHarga = 0;

		// sort($dataharga);

		$yng = $this->terbilang($data[0]->total_setelah_diskon);

        $c_pdf = new FPDF('P', 'mm', 'A4');
        $c_pdf->AddPage();
        $c_pdf->header('Arial');
        $c_pdf->setTopMargin(15);
        $c_pdf->setLeftMargin(12);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial','', 15);
        $c_pdf->Cell(75,10,'MANAGEMENT STATE', 0,1, 'C');
        $c_pdf->SetFont('Arial', 'B', 17);
        $c_pdf->Cell(10);
		$c_pdf->Cell(190,7, 'PURI SAFIRA RESIDENCE', 0,1,'L');
        $c_pdf->SetFont('Arial', 'B', 8);
        $c_pdf->Cell(10);
		$c_pdf->Cell(75,5, 'Jl. Raya Darmo No.75-77, Surabaya',0,0, 'C');
		$c_pdf->SetFont('Arial', 'U',25);
		$c_pdf->Cell(30);
		$c_pdf->Cell(120,5, 'Tanda Terima',0,1, 'L');
		$c_pdf->SetFont('Arial', 'B',7);
		$c_pdf->Cell(10);
		$c_pdf->Cell(75,4, 'Telp. (031) 5666615, 5666616',0,1, 'C');
	   		
		$c_pdf->Line(15, 40, 220-25, 40);
        $c_pdf->Line(15, 40, 220-25, 40);
        $c_pdf->Line(15, 40, 220-25, 40);

        $c_pdf->Cell(10,8, '', 0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial', '', 12);
        $c_pdf->Cell(40,8,'Sudah Terima dari :' ,0,0, 'L');
		$c_pdf->Cell(55,8, $data[0]->nama ,0,0, 'L');

		$c_pdf->Cell(14,8,'Type: ',0,0,'L');
		$c_pdf->Cell(20,8, $data[0]->type ,0,0,'L');
		$c_pdf->Cell(14,8,'Blok:',0,0,'L');
		$c_pdf->Cell(20,8, $data[0]->IDBlok,0,1,'L'); 

		$c_pdf->Cell(10);
        $c_pdf->Cell(40,8, 'Terbilang                :',0,0, 'L');
        $c_pdf->Cell(40,8, $yng,0,1, 'L');
        
		$c_pdf->Cell(10);
        $c_pdf->Cell(40,8, 'Untuk Pembayaran:',0,0, 'L');
        $c_pdf->Cell(40,8, 'IURAN MANAGEMENT ESTATE',0,1, 'L');

		$c_pdf->Cell(50);
		$c_pdf->Cell(16,8, 'Bulan :',0,0, 'L');
		$c_pdf->Cell(40,8, '' ,0,1, 'L');

		for($p=1; $p<$JmlBaris+1; $p++){
			for($q=1; $q<count($SemuaDataFix); $q++){			

				if($p == $SemuaDataFix[$q][4]){
					$jumlah = $jumlah + 1;
					$hasilBulan = $q;
				}

				
			}

			
	

			//print hasilnya (arrray[0][1] = harga, arrray[0][2] = tahun, arrray[0][3] = bulan(dlm angka), arrray[0][4] = jenis pisahnya, )
			if($jumlah == 1){
				$namabulan = $this->switch_bulan($SemuaDataFix[$hasilBulan][3]).' '.$SemuaDataFix[$hasilBulan][2];
				$HrgBln = $SemuaDataFix[$hasilBulan][1];
				$totalakhir = $jumlah * $HrgBln;
			}else {
				$namabulan = $this->switch_bulan($SemuaDataFix[$hasilBulan-($jumlah-1)][3]).' - '.$this->switch_bulan($SemuaDataFix[$hasilBulan][3]).' '.$SemuaDataFix[$hasilBulan][2];
				$HrgBln = $SemuaDataFix[$hasilBulan][1];
				$totalakhir = $jumlah * $HrgBln;
			}

			

			$c_pdf->Cell(50);
			$c_pdf->Cell(55,8, $namabulan ,0,0, 'L');
			$c_pdf->Cell(7,8, ': '.$jumlah ,0,0, 'L');
			$c_pdf->Cell(22,8, 'bulan x Rp.',0,0, 'L');
			$c_pdf->Cell(14,8,  $HrgBln ,0,0, 'L');
			$c_pdf->Cell(25,8, ': Total = Rp.',0,0, 'L');
			$c_pdf->Cell(15,8, number_format($totalakhir, 0, ',', '.') ,0,1, 'L');
			$okee=0;

			$jmlTambahanHarga = 0;
			$variabel1 = null;
			$jumlah = 0;
			$hasilBulan = 0;
		}

		$c_pdf->Cell(10);
        $c_pdf->Cell(48,8, 'Total diskon            : Rp.',0,0, 'L');
		$c_pdf->Cell(40,8, number_format($data[0]->diskon, 0, ',', '.') ,0,1, 'L');

		$c_pdf->Cell(10);
        $c_pdf->Cell(40,8, 'Keterangan             :',0,0, 'L');
		$c_pdf->MultiCell(100,8, $data[0]->keterangan_diskon ,0, 'L');

		$c_pdf->Cell(10);
        $c_pdf->Cell(48,8, 'Jumlah Rupiah       : Rp.',0,0, 'L');
		$c_pdf->Cell(40,8, number_format($data[0]->total_setelah_diskon, 0, ',', '.') ,0,1, 'L');	
        
		$c_pdf->Cell(10,10, '', 0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial', '', '12');
		$c_pdf->Cell(115,7, 'Yang Menyerahkan,',0,0, 'L');
		$c_pdf->Cell(80,7, 'Surabaya, '.$tglbayar.' '.$blnbayar.' ' .$thnbayar,0,1, 'L');
		
        $c_pdf->SetFont('Arial','','10');
		$c_pdf->Cell(10);       
        $c_pdf->Cell(140,5, 'Penerima,',0,0, 'R');
        $c_pdf->Cell(10,10,'',0,1);
        $c_pdf->Cell(10);
    
        $c_pdf->Cell(10,15,'',0,1);
        $c_pdf->Cell(10);
        $c_pdf->SetFont('Arial','','12');
		$c_pdf->Cell(115,5, '('.$data[0]->nama_user.')',0,0); 
		$c_pdf->Cell(100,5, '('.$data[0]->nama.')',0,0);
		   
		$caca = "";
		$nilai = "";
          
		$c_pdf->Output();
		
    }


}
