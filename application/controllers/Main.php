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
		$this->load->helper('url_helper');
		date_default_timezone_set('Asia/Jakarta');
	}

	//LOAD VIEW

	//front
	public function index()
	{
		$this->load->view('login');
	}
	

	//Dashboard admin
	public function dashboardadmin(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/dashboard');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//Dashboard staff
	public function dashboardstaff(){
		if ($this->checkcookiestaff()) {
			$this->load->view('header1');
			$this->load->view('staff/blok_page');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	///profile
	public function profileadmin(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/profile_page');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//Cluster
	public function cluster(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/cluster_page');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//Blok
	public function blok(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/blok_page');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//Blok detail
	public function blokdetail(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/blok_detail_page');
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//Customer
	public function customer(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/customer_page');		

		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//Staff
	public function staff(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/staff_page');		
		}else{
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//Arsip
	public function arsip(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/arsip_admin_page');
		}else if ($this->checkcookiestaff()) {
			$this->load->view('header1');
			$this->load->view('staff/arsip_staff_page');
		}else {
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//Transaksi
	public function arsipdata(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/arsip_page');
		}else {
			header("Location: ".base_url()."index.php/login");
			die();
		}
	}

	//Detail iuran tagihan
	public function iurandetail(){
		if ($this->checkcookieuser()) {
			$this->load->view('header');
			$this->load->view('admin/tagihan_page');
		} else if ($this->checkcookiestaff()) {
			$this->load->view('header1');
			$this->load->view('staff/detail_iuran_page');
		}else{
			header("Location: ".base_url()."index.php/login");
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
		$data = $this->ClusterModel->get_all(null, $perumahan);
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
	//ambil data blok
	//parameter 1: true bila ingin return array, kosongi bila ingin Json
	public function get_all_blok($return_var = NULL){
		$perumahan = $this->input->post('perumahan');
		$cluster = $this->input->post('cluster');
		$data = $this->BlokModel->get_all(null, $perumahan, $cluster);
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
	public function get_all_arsip($isAdmin, $return_var = NULL){
		$startDate = $this->input->post('startDate');
		$endDate = $this->input->post('endDate');
		if($isAdmin){
			$username = $this->get_cookie_decrypt("adminCookie");
			$data = $this->TagihanModel->get_all(NULL,1,$startDate,$endDate);
		} else{
			$username = $this->get_cookie_decrypt("staffCookie");
			$data = $this->TagihanModel->get_all($username, 1,$startDate,$endDate);
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

	public function get_transaksi(){
		$perumahan = $this->input->post('perumahan');
		$cluster = $this->input->post('cluster');
		$data = $this->TransaksiModel->get_all($perumahan, $cluster);
		
		if (empty($data)){
			$data = [];
		}
		echo json_encode($data);
	}

	public function get_tagihan($isAdmin, $return_var = NULL){
		if($isAdmin){
			$username = $this->get_cookie_decrypt("adminCookie");
			$data = $this->TagihanModel->get_all(NULL,0);
		} else{
			$username = $this->get_cookie_decrypt("staffCookie");
			$data = $this->TagihanModel->get_all($username, 0);
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
			$data = array(
				'IDPerumahan' => $this->input->post('id'),
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
			$perumahan =  $this->input->post('perum');
			$idperum = $this->ClusterModel->get_perumahan($perumahan);

			$data = array(
				'IDCluster' => $this->input->post('id'),
				'IDPerumahan' => $idperum,
				'nama_cluster' => $this->input->post('nama')
			);
			$insertStatus = $this->ClusterModel->insert($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	public function insert_blok() {
		if ($this->checkcookieuser()) {
			$id = $this->input->post('id');
			$perumahan =  $this->input->post('perumahan');
			$cluster =  $this->input->post('cluster');
			$harga =  $this->input->post('harga');

			
			$data = array(
				'IDBlok' => $id,
				'IDCluster' => $cluster,
				'Harga' => $harga
			);
			$insertStatus = $this->BlokModel->insert($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	public function insert_customer() {
		if ($this->checkcookieuser()) {
			$data = array(
				'IDCustomer' => $this->input->post('id'),
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
			$username =  $this->input->post('id');
			$pass =  md5($this->input->post('password'));
			$nama =  $this->input->post('nama');
			$nomor =  $this->input->post('nomor');
			$perumahan = $this->input->post('perum');
			$staff = "staff";
			$idperum = $this->ClusterModel->get_perumahan($perumahan);

			$data = array(
				'username' => $username,
				'password' => $pass,
				'nama' => $nama,
				'pangkat' => $staff,
				'nomor' => $nomor
			);

			$data1 = array(
				'username' => $username,
				'status' => '1'
			);

			$where= array('IDPerumahan' => $idperum );
			// $updateperumahan = $this->PerumahanModel->update($where, $data1);
			$insertStatus = $this->StaffModel->insert($data);
			echo $insertStatus;
		}else{
			echo "access denied";
		}
	}

	//UPDATE

	//Ubah password user
	//note: API hanya bisa diakses saat ada cookie user
	//parameter 1: username
	//input: form POST seperti di bawah
	//output: success/failed/id not found/wrong old password/access denied
	public function update_password_user($id){
		if ($this->checkcookieuser()) {
			$oldpassword = md5($this->input->post('oldpassword'));
			$newpassword = md5($this->input->post('newpassword'));
			$filter = array('username'=> $id);
			$data = $this->Default_model->get_data_user($filter);
			if (empty($data)){
				echo "id not found";
			}else{
				foreach ($data as $row){
					if ($oldpassword == $row['password']){
						$update_data = array(
							'password' => $newpassword
						);
						$updateStatus = $this->Default_model->update_user($id,$update_data);
						echo $updateStatus;
					}else{
						echo "wrong old password";
					}
				}
			}
		}else{
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
		$perumahan = $this->input->post('perumahan');
		$nama = $this->input->post('nama');

		$idperum = $this->ClusterModel->get_perumahan($perumahan);

		$data = array(
			'nama_cluster' => $nama,
			'IDPerumahan' => $idperum
		);
		
		$where= array('IDCluster' => $id );
        $this->ClusterModel->update($where, $data);

		echo $idperum;
	}

	//Edit data blok
	public function update_blok(){
		$id = $this->input->post('id');
		$perumahan = $this->input->post('perumahan');
		$cluster = $this->input->post('cluster');
		$customer = $this->input->post('customer');
		$harga = $this->input->post('harga');
				
		// $idcustomer = $this->CustomerModel->get_customer($customer);

		$data = array(
			'IDCustomer' => $customer,
			'IDCluster' => $cluster,
			'harga' => $harga
		);
		
		$where= array('IDBlok' => $id );
        $this->BlokModel->update($where, $data);

		echo $cluster;
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
		$perumahan = $this->input->post('perum');
		$idlama = $this->input->post('idlama');

		$idperum = $this->BlokModel->get_perumahan($perumahan);

		// $pass = md5('12345');

		// $idperum = $this->ClusterModel->get_perumahan($perumahan);

		$data = array(
			'username' => $username,
			'nama' => $nama,
			'nomor' => $nomor,
			'pangkat' => 'staff'
		);

		$data1 = array(
			'username' => $username,
			'status' => '1'
		);

		$data2 = array(
			'username' => null,
			'status' => '0'
		);

		// $where= array('username' => $username );
		// $this->StaffModel->update($where, $data);
		echo $idperum;
		echo $idlama;
		// $where1= array('IDPerumahan' => $idperum );
		// $this->PerumahanModel->update($where, $data1);
		// $where1= array('IDPerumahan' => $idlama );
		// $this->PerumahanModel->update($where, $data2);
		

		
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

	public function delete_customer($id) {
		if ($this->checkcookieuser()) {
			$deleteStatus = $this->CustomerModel->delete($id);
			echo $deleteStatus;
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
		if ($is_login && $status == 'admin') {
			echo "Selamat Datang Admin";
		} else if ($is_login && $status == 'staff') {
			echo "Login Berhasil";
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
		// echo "cookie created";
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
			'value'  => str_rot13($value), //Not really encrypt anything, just jumble text :P
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
			return str_rot13($this->input->cookie($name,true));
		}else{
			echo "no cookie";
		}
	}


	
}
