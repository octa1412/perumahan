<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	
	public function login()
	{
		$this->load->view('header');
		$this->load->view('admin/dashboard');
	}
    
	public function customer()
	{
		$this->load->view('header');
		$this->load->view('admin/customer_page');
	}

	public function cluster()
	{
		$this->load->view('header');
		$this->load->view('admin/cluster_page');
	}

	public function blok()
	{
		$this->load->view('header');
		$this->load->view('admin/blok_page');
	}
	
	public function transaksi()
	{
		$this->load->view('transaksi_page');
	}

	public function arsip()
	{
		$this->load->view('arsip_staff_page');
	}

	
}
