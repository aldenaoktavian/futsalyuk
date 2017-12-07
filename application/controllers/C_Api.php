<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Api extends CI_Controller {

	public function index()
	{
		
	}

	public function cancel_booking()
	{
		$this->load->model('M_booking');

		$this->M_booking->cancel_old_transaction();
	}
}
