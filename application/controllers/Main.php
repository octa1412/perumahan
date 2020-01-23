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
		$this->load->view('dashboard');
	}
    
	public function customer()
	{
		$this->load->view('customer_page');
	}
	
}
