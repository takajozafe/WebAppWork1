<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCoAccount extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
    
	public function index()
	{
		$this->load->database();
		if (is_null(get_cookie('_token'))) {
			redirect('../backend/signIn');
			exit();
		} else {
			$this->load->database();
			$this->load->view('backend/guard'); // Guard View
			$this->load->view('backend/header'); // Header View
			$this->load->view('backend/breadcrumb'); // Breadcrumb View
			$this->load->view('backend/management/addCoAccount'); // View			
		}
	}
}