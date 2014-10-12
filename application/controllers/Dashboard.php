<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	var $data = array();

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}

	public function index()
	{
		$username = $this->session->userdata('username');
		$data = array(
			'data' => $this->db->get('login'), 
			'view' => "dashboard/default"
			);
		$this->load->view('template',$data);
	}

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo 'You don\'t have permission to access this page.';
			die(); 
		}  
	}
}