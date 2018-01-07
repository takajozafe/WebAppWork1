<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingBetPercentage extends CI_Controller {

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
			$this->load->view('backend/shared/header'); // Header View
			$this->load->view('backend/shared/navigational'); // Navigational View
            $this->load->view('backend/managements/setting-bet-percentage'); // View
			$this->load->view('backend/shared/footer'); // Footer View
		}
	}
}