<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_halaman_utama extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('new-page/halaman_utama_new');
	}
	
	public function login_comm()
	{
		
		$this->load->view('new-page/halaman_login_comm');//die('asdasd');
	}
	
	public function sosial()
	{
		
		$this->load->view('new-page/halaman_sosial');//die('asdasd');
	}

	public function sosial_team()
	{
		
		$this->load->view('new-page/halaman_sosial_team');//die('asdasd');
	}

	public function undangan_bertanding()
	{
		
		$this->load->view('new-page/halaman_undangan_bertanding');//die('asdasd');
	}
}
