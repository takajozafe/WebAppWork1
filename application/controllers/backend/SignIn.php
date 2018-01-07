<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
    
	public function index()
	{
		$this->load->database();
		$this->load->view('backend/signIn'); // View
	}
}