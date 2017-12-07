<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra_lapangan extends CI_Controller {

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

	public function __construct()
    {   
        parent::__construct();
        $this->load->helper('mitra_helper');
    } 

	public function index()
	{	
		$id_mitra = $this->session->userdata('id_mitra');
		if ($id_mitra == '') {
			$this->load->view('mitra/mitra_login');	
		}
		else 
		{
			redirect('mitra_lapangan/profile_lapangan');
		}
		
	}

	public function login()
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		$this->load->model('M_mitra_lapangan');
		$data_login = $this->M_mitra_lapangan->do_login($email,$password);

		$row = count($data_login);
		if ($row > 0) 
		{

			foreach ($data_login as $key => $value) {
				$id_mitra = $value['id'];
				$email = $value['email'];
				$nama_lapangan = $value['nama_lapangan'];
			}

			$newdata = array(
		        'id_mitra'  => $id_mitra,
		        'email'     => $email,
		        'nama_lapangan' => $nama_lapangan
			);

			$this->session->set_userdata($newdata);
			redirect('mitra_lapangan/profile_lapangan');
		}
		else 
		{
			redirect('mitra_lapangan');
		}
	}	

	public function change_lap($id_lap="") {

		$id_mitra = $this->session->userdata('id_mitra');

		$this->load->model('M_mitra_lapangan');

		if($id_lap != ""){
			$id_lapangan = db_get_one_data('id', 'lapangan', array('md5(id)'=>$id_lap));
			$add_id_lap = array(
					'id_lapangan'	=> $id_lapangan
				);
			$this->session->set_userdata(array_merge($this->session->userdata(), $add_id_lap));
			redirect('mitra_lapangan');
		} else{
			$data_lapangan = $this->M_mitra_lapangan->get_all_lapangan($id_mitra);
			$varcontent['data_lapangan'] = $data_lapangan;

			$varcontent['view'] = 'ganti_lapangan';	
			$this->load->view('mitra/template', $varcontent);
		}
	}

	public function profile_lapangan() {

		if(isset($_SESSION['data_pictures'])){
			foreach($_SESSION['data_pictures'] as $data_pictures){
				for($i=0; $i<sizeof($data_pictures); $i++){
					unlink($data_pictures[$i]);
					unset($data_pictures[$i]);
				}
			}

			unset($_SESSION['data_pictures']);
		}

		$id_lapangan = $this->session->userdata('id_lapangan');

		$this->load->model('M_mitra_lapangan');

		$data_lapangan = $this->M_mitra_lapangan->get_data_lapangan($id_lapangan);
		$varcontent['data_lapangan'] = $data_lapangan;

		$tipe_lapangan = $this->M_mitra_lapangan->get_all_tipe($id_lapangan);
		$varcontent['tipe_lapangan'] = $tipe_lapangan;

		$varcontent['view'] = 'profile_lapangan';	
		$this->load->view('mitra/template', $varcontent);
	}

	public function informasi_lapangan() {

		$id_mitra = $this->session->userdata('id_mitra');

		$post = $this->input->post();

		$this->load->model('M_mitra_lapangan');

		if($post){
			$data_lapangan = array(
					'nama'		=> $post['nama_lapangan'],
					'deskripsi'	=> $post['deskripsi'],
					'daerah'	=> $post['daerah'],
					'kota'		=> $post['kota'],
					//'picture'	=> $post[''],
					'lat'		=> $post['latitude'],
					'long'		=> $post['longitude']
				);
			$update = $this->M_mitra_lapangan->update_by_md5($data_lapangan, $post['lapid']);
			if($update != 0){
				$_SESSION['message']['color'] = "green";
				$_SESSION['message']['text'] = "Berhasil update Informasi Umum Lapangan";
			} else{
				$_SESSION['message']['color'] = "red";
				$_SESSION['message']['text'] = "Gagal update Informasi Umum Lapangan. Silahkan coba kembali nanti.";
			}
		}

		$data_lapangan = $this->M_mitra_lapangan->get_data_lapangan($id_mitra);
		$varcontent['data_lapangan'] = $data_lapangan;

		$varcontent['view'] = 'profile_lapangan';	
		$this->load->view('mitra/template', $varcontent);
	}

	public function profile_image() {

		$post = $this->input->post();

		$this->load->model('M_mitra_lapangan');

		$config_image['upload_path']          = './uploadfiles/mitra-images/';
		$config_image['allowed_types']        = 'gif|jpg|png|gif';
		$config_image['max_size']             = 4000;

		$new_name = time()."_".str_replace(" ", "_", $_FILES["profile_image"]['name']);
		$config_image['file_name'] = $new_name;

		$this->load->library('upload', $config_image, 'profile_image');
		if ( ! $this->profile_image->do_upload('profile_image')){
			$message = $this->profile_image->display_errors();
			echo "<script>alert('".$message."');</script>";
		} else{
			$data_image = $this->profile_image->data();
		}

		$data_update = array(
				'picture'		=> $data_image["raw_name"].$data_image["file_ext"]
			);
		$update_image = $this->M_mitra_lapangan->update_by_md5($data_update, $post['lapid']);
		if($update_image != 0){
			echo $data_image["raw_name"].$data_image["file_ext"];
		} else{
			echo "gagal";
		}

	}

	function tipe_lapangan(){
		
		$post = $this->input->post();

		$this->load->model('M_mitra_lapangan');

		$count = (int)$post['next_id'] - 1;

		//$next_id = next_auto_increment('tipe_lapangan');

		$id_lapangan = db_get_one_data('id', 'lapangan', array('md5(id)'=>$post['lapid']));

		for($i=0; $i<=$count; $i++){

			$id_tipe = $post['tipe_item_'.$i];

			if($_FILES['profile_image_'.$i]['name']){
				$config_image['upload_path']          = './uploadfiles/mitra-images/';
				$config_image['allowed_types']        = 'gif|jpg|png|gif';
				$config_image['max_size']             = 4000;

				$new_name = time()."_".str_replace(" ", "_", $_FILES['profile_image_'.$i]['name']);
				$config_image['file_name'] = $new_name;

				$this->load->library('upload', $config_image, 'profile_image');
				if ( ! $this->profile_image->do_upload('profile_image_'.$i)){
					$message = $this->profile_image->display_errors();
					echo "<script>alert('".$message."');</script>";
					$picture = '';
				} else{
					$data_image = $this->profile_image->data();
					$picture = $data_image["raw_name"].$data_image["file_ext"];
				}
			} else{
				$picture = '';
			}

			$data_tipe = array(
					'nama_tipe'	=> $post['nama_tipe_'.$i],
					'tarif'		=> $post['tarif_'.$i],
					'deskripsi'	=> $post['deskripsi_'.$i],
					'picture'	=> $picture
				);
			if($id_tipe != '0'){
				$update = $this->M_mitra_lapangan->update_type($data_tipe, $post['tipe_item_'.$i]);
			} else{
				$next_id = next_auto_increment('tipe_lapangan');
				$next_id_length = strlen((string)$next_id);
				$kode_tipe = '';
				if($next_id_length == 1){
					$kode_tipe = 'TL1703000'.$next_id;
				} else if($next_id_length == 2){
					$kode_tipe = 'TL170300'.$next_id;
				} else if($next_id_length == 3){
					$kode_tipe = 'TL17030'.$next_id;
				} else{
					$kode_tipe = 'TL1703'.$next_id;
				}
				
				$id_tipe = $this->M_mitra_lapangan->add_type(array_merge($data_tipe, array('id_lapangan'=>$id_lapangan, 'kode_tipe'=>$kode_tipe)));
			}

			if(isset($post['gallery_'.$i.'_jml'])){
				for($j=0; $j<$post['gallery_'.$i.'_jml']; $j++){
					if($post['gallery_'.$i.'_'.$j.'_id'] == 0){
						$data_image = array(
								'id_tipe_lapangan'	=> $id_tipe,
								'picture'			=> str_replace(base_url(), '', $post['gallery_'.$i.'_'.$j])
							);
						$this->M_mitra_lapangan->add_galery_type($data_image);
					}
				}
				unset($_SESSION['data_pictures']);
			}
		}

		redirect('mitra_lapangan/profile_lapangan');
	}

	public function upload_galeri_lapangan($place='')
	{
		$data_pictures = array();
		if(isset($_SESSION['data_pictures'][$place])){
			$data_pictures = array_values($_SESSION['data_pictures'][$place]);
		}
		$i=sizeof($data_pictures);
		foreach($_FILES as $files){
			$_FILES['galeri_lapangan']['name'] = $files['name'];
            $_FILES['galeri_lapangan']['type'] = $files['type'];
            $_FILES['galeri_lapangan']['tmp_name'] = $files['tmp_name'];
            $_FILES['galeri_lapangan']['error'] = $files['error'];
            $_FILES['galeri_lapangan']['size'] = $files['size'];

			$config_image['upload_path']          = './uploadfiles/galeri-lapangan/';
			$config_image['allowed_types']        = 'gif|jpg|png|gif';
			$config_image['max_size']             = 4000;

			$new_name = time()."_".str_replace(" ", "_", $files['name']);
			$config_image['file_name'] = $new_name;

			$this->load->library('upload', $config_image);
            $this->upload->initialize($config_image);
			if ( ! $this->upload->do_upload('galeri_lapangan')){
				$message = $this->upload->display_errors();
				echo "<script>alert('".$message."');</script>";
			} else{
				$data_image = $this->upload->data();
				$data_pictures[$i] = 'uploadfiles/galeri-lapangan/'.$data_image["raw_name"].$data_image["file_ext"];
				$i++;
			}
		}

		$_SESSION['data_pictures'][$place] = $data_pictures;
		echo json_encode($data_pictures);
	}

	public function remove_galeri_lapangan($place, $key, $id)
	{

		if($id != 0){
			$this->load->model('M_mitra_lapangan');

			$this->M_mitra_lapangan->delete_galery_type($id);
		}

		unlink($_SESSION['data_pictures'][$place][$key]);

		unset($_SESSION['data_pictures'][$place][$key]);

		$_SESSION['data_pictures'][$place][$key] = array_values($_SESSION['data_pictures'][$place]);

		echo json_encode($_SESSION['data_pictures'][$place][$key]);
	}

	/* Start Halaman Transaksi Booking */
	public function transaksi_booking() {
		$id_lapangan = $this->session->userdata('id_lapangan');

		$this->load->model('M_mitra_lapangan');

		$all_transaction = $this->M_mitra_lapangan->all_transaction($id_lapangan);
		$varcontent['all_transaction'] = $all_transaction;

		$varcontent['view'] = 'transaksi_booking';	
		$this->load->view('mitra/template', $varcontent);
	}

	public function search_transaksi_booking() {
		
		$id_lapangan = $this->session->userdata('id_lapangan');

		$this->load->model('M_mitra_lapangan');

		$all_type = $this->M_mitra_lapangan->get_all_tipe($id_lapangan);

		//$all_transaction = $this->M_mitra_lapangan->all_transaction($id_lapangan, $this->input->post('startdate'));
		
		$html = '';
		foreach($all_type as $type){
			$html .= '<div class="container_box container_item">
				          <h4>'.$type['nama_tipe'].'</h4><br/>';
			for($i=8; $i<=22; $i++){
				$j = $i + 1;

				$start = $i;
				if($i<10){
					$start = "0".$i;
				}

				$end = $j;
				if($j<10){
					$end = "0".$j;
				}

				$transaksi = $this->M_mitra_lapangan->get_transaction($type['id_tipe'], $start.':01', $end.':00', $this->input->post('startdate'));
				if($transaksi != NULL){
					$html .= '<div class="transaksi_item_left">
					            <label class="label_time">'.$start.':00 - '.$end.':00</label><br/>
					            <span>'.$transaksi['firstname'].' '.$transaksi['lastname'].'</span>
					          </div>
					          <div class="transaksi_item_right">
					            <label class="switch">
					              <input type="checkbox" checked disabled>
					              <span class="slider round"></span>
					            </label>
					          </div>
					          <div class="clearfix"></div>';
				} else{
					$html .= '<div class="transaksi_item_left">
					            <label class="label_time">'.$start.':00 - '.$end.':00</label><br/>
					            <span></span>
					          </div>
					          <div class="transaksi_item_right">
					          	<button class="btn btn-primary">Check In</button>
					            <label class="switch">
					              <input type="checkbox">
					              <span class="slider round"></span>
					            </label>
					          </div>
					          <div class="clearfix"></div>';
				}
			}

			$html .= '</div>';
		}

		echo json_encode($html);
		
	}
	/* End Halaman Transaksi Booking */
	
}
