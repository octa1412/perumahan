<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller { 
	    	
	public function __construct(){
		parent::__construct();
		$this->load->model('Default_model');
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
			$this->load->view('edit_modal');
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
	public function transaksi(){
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

	public function delete_customer($id) {
		if ($this->checkcookieadmin()) {
			$deleteStatus = $this->CustomerModel->delete($id);
			echo $deleteStatus;
		}else{
			echo "access denied";
		}
	}

	public function delete_blok($id){
		if ($this->checkcookieadmin()) {
			$deleteStatus = $this->Default_model->delete_blok($id);
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
			echo str_rot13($this->input->cookie($name,true));
		}else{
			echo "no cookie";
		}
	}


	
}
