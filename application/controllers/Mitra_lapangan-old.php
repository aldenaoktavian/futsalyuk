<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra_lapangan extends CI_Controller {

	public function __construct()
    {   
        parent::__construct();
        if ( !isset($_SESSION['id_mitra']) ) {
			$this->load->view('mitra/mitra_login');	
		}
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
		if($data_login != NULL){
			$newdata = array(
		        'id_mitra'  => $data_login['id'],
		        'email'     => $data_login['email'],
		        'nama_lapangan' => $data_login['nama_lapangan'],
		        'id_lapangan'	=> $data_login['id_lapangan']
			);
			$this->session->set_userdata($newdata);
			redirect('mitra_lapangan/profile_lapangan');
		} else{
			redirect('mitra_lapangan');
		}
	}	

	public function logout() {
		session_destroy();
		redirect('mitra_lapangan');
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

	public function add_lapangan() {
		$post = $this->input->post();

		if($post){
			$next_id = next_auto_increment('lapangan');
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
		if($this->input->post('startdate') == date('Y-m-d')){
			$hour = date('H');
		} else{
			$hour = 8;
		}
		foreach($all_type as $type){
			$html .= '<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="container_box">
				          <h4>'.$type['nama_tipe'].'</h4><br/>';
			for($i=$hour+1; $i<=22; $i++){
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
					$btn_checkin = '';
					$status_booking = '';
					$status_checked = 'checked disabled';

					if($transaksi['transaksi_status'] == 0){
						$btn_checkin = '<button class="btn btn-primary" onclick="checkin('.$i.', '.$j.', '.$type['id_tipe'].')">Check In</button>';
					}

					if($transaksi['transaksi_status'] == 1){
						$status_booking = 'Digunakan';
					} else if($transaksi['transaksi_status'] == 2){
						$status_booking = 'Batal Digunakan';
						$status_checked = 'onclick="newbooking(this, '.$i.', '.$j.', '.$type['id_tipe'].')"';
					}

					if($transaksi['id_user'] == 0){
						$html .= '<div class="transaksi_item_left">
						            <label class="label_time">'.$start.':00 - '.$end.':00</label><br/>
						            <span style="color: #04d404;">'.$status_booking.'</span>'.($status_booking != '' ? '<br/><br/>' : '').'
						          </div>
						          <div class="transaksi_item_right">'.
						    		$btn_checkin
						    		.'<label class="switch">
						              <input type="checkbox" '.$status_checked.'>
						              <span class="slider round"></span>
						            </label>
						          </div>
						          <div class="clearfix"></div>';
					} else{
						$html .= '<div class="transaksi_item_left">
						            <label class="label_time">'.$start.':00 - '.$end.':00</label><br/>
						            <span>'.$transaksi['firstname'].' '.$transaksi['lastname'].'</span><br/>
						            <span style="color: #04d404;">'.$status_booking.'</span>
						            <br/><br/>
						          </div>
						          <div class="transaksi_item_right">'.
						    			$btn_checkin
						    		.'<label class="switch">
						              <input type="checkbox" '.$status_checked.'>
						              <span class="slider round"></span>
						            </label>
						          </div>
						          <div class="clearfix"></div>';
					}
				} else{
					$html .= '<div class="transaksi_item_left">
					            <label class="label_time">'.$start.':00 - '.$end.':00</label><br/>
					            <span></span>
					          </div>
					          <div class="transaksi_item_right">
					            <label class="switch">
					              <input type="checkbox" onclick="newbooking(this, '.$i.', '.$j.', '.$type['id_tipe'].')">
					              <span class="slider round"></span>
					            </label>
					          </div>
					          <div class="clearfix"></div>';
				}
			}

			$html .= '</div></div>';
		}

		echo json_encode($html);
		
	}

	public function offline_transaksi_booking(){	
		$id_lapangan = $this->session->userdata('id_lapangan');

		$this->load->model('M_mitra_lapangan');

		$post = $this->input->post();

		$kode_booking = generateRandomString(6);
		$data_transaksi = array(
				'id_user'	=> 0,
				'id_tipe'	=> $post['id_tipe'],
				'tanggal'	=> $post['tanggal'],
				'start_time'	=> $post['start_time'],
				'end_time'	=> $post['end_time'],
				'tgl_transaksi'	=> date('Y-m-d H:i:s'),
				'kode_booking'	=> $kode_booking,
				'transaksi_status'	=> 0
			);
		$add_transaksi = $this->M_mitra_lapangan->add_transaction($data_transaksi);

		$result = array();
		if($add_transaksi != 0){
			$result = array(
					'status' => 1,
					'message' => $kode_booking
				);
		} else{
			$result = array(
					'status' => 0,
					'message' => 'Error. Silahkan coba lagi nanti.'
				);
		}

		echo json_encode($result);
	}

	public function checkin_lap(){
		$post = $this->input->post();

		$this->load->model('M_mitra_lapangan');

		$data_transaksi = $this->M_mitra_lapangan->get_transaction_bycode(array('id_tipe'=>$post['id_tipe'], 'start_time'=>$post['start_time'], 'end_time'=>$post['end_time'], 'tanggal'=>$post['tanggal'], 'kode_booking'=>$post['kode_booking']));

		$result = array();
		if($data_transaksi != NULL){
			if($data_transaksi['id_user'] != 0){
				if($post['transaksi_status'] == 1){
					$data_update = array(
							'transaksi_status'	=> $post['transaksi_status'],
							'deposit'			=> 0
						);
					$member_saldo = db_get_one_data('saldo', 'member_booking', array('user_id' => $data_transaksi['user_id']));
					$data_member_saldo = array(
							'saldo'	=> $member_saldo + $data_transaksi['deposit']
						);

					$update_transaksi = $this->M_mitra_lapangan->update_transaction($data_update, $data_transaksi['transaksi_id']);

					if($update_transaksi != 0){
						$update_saldo_member = $this->M_mitra_lapangan->update_member('user_id', $data_transaksi['user_id']);
						if($update_saldo_member != 0){
							$result = array(
									'status' => 1,
									'message' => 'Transaksi telah di update.'
								);
						} else{
							$result = array(
									'status' => 0,
									'message' => 'Gagal update saldo member. Silahkan coba kembali nanti.'
								);
						}
					} else{
						$result = array(
								'status' => 0,
								'message' => 'Gagal update transaksi. Silahkan coba kembali nanti.'
							);
					}
				} else{
					$data_update = array(
							'transaksi_status'	=> $post['transaksi_status']
						);
					$update_transaksi = $this->M_mitra_lapangan->update_transaction($data_update, $data_transaksi['transaksi_id']);
					if($update_transaksi != 0){
						$result = array(
								'status' => 1,
								'message' => 'Transaksi telah di update.'
							);
					} else{
						$result = array(
								'status' => 0,
								'message' => 'Gagal update transaksi. Silahkan coba kembali nanti.'
							);
					}
				}
			} else{
				$data_update = array(
						'transaksi_status'	=> $post['transaksi_status']
					);
				$update_transaksi = $this->M_mitra_lapangan->update_transaction($data_update, $data_transaksi['transaksi_id']);
				if($update_transaksi != 0){
					$result = array(
							'status' => 1,
							'message' => 'Transaksi telah di update.'
						);
				} else{
					$result = array(
							'status' => 0,
							'message' => 'Gagal update transaksi. Silahkan coba kembali nanti.'
						);
				}
			}
		} else{
			$result = array(
					'status' => 0,
					'message' => 'Kode booking tidak sesuai.'
				);
		}

		echo json_encode($result);
	}
	/* End Halaman Transaksi Booking */

	/* Start Halaman Deposit */
	public function deposit() {
		$id_lapangan = $this->session->userdata('id_lapangan');

		$this->load->model('M_mitra_lapangan');

		$all_transaction_canceled = $this->M_mitra_lapangan->all_transaction_con('a.transaksi_id, c.member_booking_firstname as firstname, c.member_booking_lastname as lastname, b.nama_tipe, a.tanggal, a.start_time, a.end_time, a.deposit, a.kode_booking', array('b.id_lapangan'=>$id_lapangan, 'a.transaksi_status'=>2));
		$varcontent['all_transaction_canceled'] = $all_transaction_canceled;

		$varcontent['total_deposit_transaction'] = $this->M_mitra_lapangan->sum_transaction_con() - $this->M_mitra_lapangan->sum_tarik_dana(array('id_mitra'=>$this->session->userdata('id_mitra'), 'status'=>1));

		$varcontent['all_tarik_deposit'] = $this->M_mitra_lapangan->all_tarik_deposit(array('id_mitra'=>$this->session->userdata('id_mitra')));

		$varcontent['view'] = 'deposit';	
		$this->load->view('mitra/template', $varcontent);
	}

	public function add_tarik_deposit(){
		$this->load->model('M_mitra_lapangan');

		$post = $this->input->post();

		$data_tarik_deposit = array(
				'id_mitra'	=> $_SESSION['id_mitra'],
				'kode_tarik_deposit'	=> generateRandomString(6),
				'tanggal_tarik_deposit'	=> date('Y-m-d H:i:s'),
				'jml_tarik_deposit'	=> $post['jml_tarik_deposit'],
				'nama_bank'	=> $post['nama_bank'],
				'no_rekening'	=> $post['no_rekening'],
				'nama_pemilik_rekening'	=> $post['nama_pemilik_rekening'],
				'status'	=> 0
			);
		$add_tarik_deposit = $this->M_mitra_lapangan->add_tarik_deposit($data_tarik_deposit);

		$result = array();
		if($add_tarik_deposit != 0){
			$result = array(
					'status'	=> 1,
					'title'		=> 'Berhasil!',
					'text'		=> 'Permintaan penarikan dana deposit telah berhasil dibuat. Selanjutnya permintaan akan diproses oleh admin kami. Mohon menunggu.',
					'icon'		=> 'success'
				);
		} else{
			$result = array(
					'status'	=> 0,
					'title'		=> 'Gagal!',
					'text'		=> 'Permintaan penarikan dana deposit gagal dibuat. Silahkan coba kembali nanti.',
					'icon'		=> 'error'
				);
		}

		echo json_encode($result);
	}

	public function detail_tarik_deposit(){
		$this->load->model('M_mitra_lapangan');

		$post = $this->input->post();

		$detail_tarik_deposit = $this->M_mitra_lapangan->detail_tarik_deposit($post['id'], true);

		echo json_encode($detail_tarik_deposit);
	}

	public function cancel_tarik_deposit(){
		$this->load->model('M_mitra_lapangan');

		$post = $this->input->post();

		$data_tarik_deposit = array(
				'status'	=> 3
			);

		$update_tarik_deposit = $this->M_mitra_lapangan->update_tarik_deposit($data_tarik_deposit, array('md5(id)'=>$post['id']));

		$result = array();
		if($update_tarik_deposit != 0){
			$result = array(
					'status'	=> 1
				);
		} else{
			$result = array(
					'status'	=> 0
				);
		}

		echo json_encode($result);
	}
	/* End Halaman Deposit */
	
	/* Start Halaman Laporan Keuangan */
	public function laporan_keuangan(){
		$id_lapangan = $this->session->userdata('id_lapangan');

		$this->load->model('M_mitra_lapangan');

		$tipe_lapangan = $this->M_mitra_lapangan->get_all_tipe($id_lapangan);
		$varcontent['tipe_lapangan'] = $tipe_lapangan;

		$varcontent['view'] = 'laporan_keuangan';	
		$this->load->view('mitra/template', $varcontent);
	}

	public function show_laporan_keuangan(){
		$this->load->model('M_mitra_lapangan');

		$post = $this->input->post();

		$date_range = explode(' - ', $post['date_range']);

		$laporan_keuangan = NULL;
		if($post['table_format'] == 1){
			$laporan_keuangan = $this->M_mitra_lapangan->get_laporan_keuangan_harian($post['tipe_lapangan'], $date_range[0], $date_range[1]);	
		} else if($post['table_format'] == 2){
			$laporan_keuangan = $this->M_mitra_lapangan->get_laporan_keuangan_bulanan($post['tipe_lapangan'], $date_range[0], $date_range[1]);	
		} else if($post['table_format'] == 3){
			$laporan_keuangan = $this->M_mitra_lapangan->get_laporan_keuangan_tahunan($post['tipe_lapangan'], $date_range[0], $date_range[1]);	
		}
		
		$data['table_format'] = $post['table_format'];
		$data['startdate'] = $date_range[0];
		$data['enddate'] = $date_range[1];
		$data['laporan_keuangan'] = $laporan_keuangan;

		$this->load->view('mitra/laporan_keuangan_detail', $data);
	}

	public function laporan_keuangan_topdf(){
		ob_start();
		$this->load->model('M_mitra_lapangan');

		$post = $this->input->post();

		$date_range = explode(' - ', $post['pdf_date_range']);

		$laporan_keuangan = NULL;
		if($post['pdf_table_format'] == 1){
			$laporan_keuangan = $this->M_mitra_lapangan->get_laporan_keuangan_harian($post['pdf_tipe_lapangan'], $date_range[0], $date_range[1]);	
		} else if($post['pdf_table_format'] == 2){
			$laporan_keuangan = $this->M_mitra_lapangan->get_laporan_keuangan_bulanan($post['pdf_tipe_lapangan'], $date_range[0], $date_range[1]);	
		} else if($post['pdf_table_format'] == 3){
			$laporan_keuangan = $this->M_mitra_lapangan->get_laporan_keuangan_tahunan($post['pdf_tipe_lapangan'], $date_range[0], $date_range[1]);	
		}
		
		$data['table_format'] = $post['pdf_table_format'];
		$data['startdate'] = $date_range[0];
		$data['enddate'] = $date_range[1];
		$data['laporan_keuangan'] = $laporan_keuangan;

		$this->load->view('mitra/laporan_keuangan_pdf', $data);
	    $html = ob_get_contents();
	    ob_end_clean();
	        
	    require_once(APPPATH.'libraries/html2pdf/html2pdf.class.php');
	    $pdf = new HTML2PDF('P','A4','en', true, 'UTF-8', array(8, 5, 11, 10));
	    $pdf->WriteHTML($html);
	    $pdf->Output('laporan-'.date('YmdHis').'.pdf', 'D');
	}

	public function laporan_keuangan_toexcel(){
		$this->load->model('M_mitra_lapangan');

		$post = $this->input->post();

		$date_range = explode(' - ', $post['excel_date_range']);

		$laporan_keuangan = NULL;
		$text_format = "";
		if($post['excel_table_format'] == 1){
			$text_format = "Harian";
			$laporan_keuangan = $this->M_mitra_lapangan->get_laporan_keuangan_harian($post['excel_tipe_lapangan'], $date_range[0], $date_range[1]);	
		} else if($post['excel_table_format'] == 2){
			$text_format = "Bulanan";
			$laporan_keuangan = $this->M_mitra_lapangan->get_laporan_keuangan_bulanan($post['excel_tipe_lapangan'], $date_range[0], $date_range[1]);	
		} else if($post['excel_table_format'] == 3){
			$text_format = "Tahunan";
			$laporan_keuangan = $this->M_mitra_lapangan->get_laporan_keuangan_tahunan($post['excel_tipe_lapangan'], $date_range[0], $date_range[1]);	
		}

		include_once(APPPATH.'libraries/PHPExcel/PHPExcel/IOFactory.php');

		//set the desired name of the excel file
		$fileName = 'laporan-'.date('YmdHis');

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->mergeCells('A1:I1');
		$style_title = array(
		        'alignment' => array(
		            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		        ),
		        'font'	=> array(
		        	'bold'	=> true
		        )
		    );
		$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($style_title);
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Laporan Keuangan '.$text_format.' tanggal '.date('d M Y', strtotime($date_range[0])).' sampai '.date('d M Y', strtotime($date_range[1])));

		// Add column headers
		$style_header = array(
		        'alignment' => array(
		            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		        ),
		        'font'	=> array(
		        	'bold'	=> true
		        ),
		        'borders' => array(
			        'allborders' => array(
			            'style' => PHPExcel_Style_Border::BORDER_THIN
			        )
			    ),
			    'fill' => array(
		            'type' => PHPExcel_Style_Fill::FILL_SOLID,
		            'color' => array('rgb' => 'b5b5b5')
		        )
		    );

		//Put each record in a new cell
		$i = 4;
		$no = 1;
		$style_item = array(
		        'borders' => array(
			        'allborders' => array(
			            'style' => PHPExcel_Style_Border::BORDER_THIN
			        )
			    )
		    );
		if($post['excel_table_format'] == 1){
			$objPHPExcel->getActiveSheet()->mergeCells('E3:F3');
			$objPHPExcel->getActiveSheet()->mergeCells('G3:H3');
			$objPHPExcel->getActiveSheet()
						->setCellValue('A3', 'No.')
						->setCellValue('B3', 'Nama')
						->setCellValue('C3', 'Tanggal')
						->setCellValue('D3', 'Waktu')
						->setCellValue('E3', 'Pendapatan')
						->setCellValue('G3', 'Transaksi Status')
						->setCellValue('I3', 'Deposit');
			$objPHPExcel->getActiveSheet()->getStyle("A3:I3")->applyFromArray($style_header);

			foreach($laporan_keuangan as $data){
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $no);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $data['fullname']);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, date('Y-m-d', strtotime($data['tanggal'])));
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $data['waktu']." Jam");
				$objPHPExcel->getActiveSheet()->mergeCells('E'.$i.':F'.$i);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, "Rp. ".number_format($data['pendapatan']));
				$objPHPExcel->getActiveSheet()->mergeCells('G'.$i.':H'.$i);
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, ($data['transaksi_status'] == 1 ? 'Digunakan' : ($data['transaksi_status'] == 2 ? 'Batal Digunakan' : ($data['transaksi_status'] == 3 ? 'Telah Digunakan' : 'Dibooking'))));
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, "Rp. ".number_format($data['deposit']));
				$objPHPExcel->getActiveSheet()->getStyle("A".$i.":I".$i)->applyFromArray($style_item);
				$i++;
				$no++;
			}	
		} else if($post['excel_table_format'] == 2){
			$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');
			$objPHPExcel->getActiveSheet()->mergeCells('F3:G3');
			$objPHPExcel->getActiveSheet()->mergeCells('H3:I3');
			$objPHPExcel->getActiveSheet()
						->setCellValue('A3', 'No.')
						->setCellValue('B3', 'Bulan')
						->setCellValue('E3', 'Waktu')
						->setCellValue('F3', 'Pendapatan')
						->setCellValue('H3', 'Deposit');
			$objPHPExcel->getActiveSheet()->getStyle("A3:I3")->applyFromArray($style_header);
			
			foreach($laporan_keuangan as $data){
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $no);
				$objPHPExcel->getActiveSheet()->mergeCells('B'.$i.':D'.$i);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $data['bulan_huruf']);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $data['waktu']." Jam");
				$objPHPExcel->getActiveSheet()->mergeCells('F'.$i.':G'.$i);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, "Rp. ".number_format($data['pendapatan']));
				$objPHPExcel->getActiveSheet()->mergeCells('H'.$i.':I'.$i);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, "Rp. ".number_format($data['deposit']));
				$objPHPExcel->getActiveSheet()->getStyle("A".$i.":I".$i)->applyFromArray($style_item);
				$i++;
				$no++;
			}
		} else if($post['excel_table_format'] == 3){
			$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');
			$objPHPExcel->getActiveSheet()->mergeCells('F3:G3');
			$objPHPExcel->getActiveSheet()->mergeCells('H3:I3');
			$objPHPExcel->getActiveSheet()
						->setCellValue('A3', 'No.')
						->setCellValue('B3', 'Tahun')
						->setCellValue('E3', 'Waktu')
						->setCellValue('F3', 'Pendapatan')
						->setCellValue('H3', 'Deposit');
			$objPHPExcel->getActiveSheet()->getStyle("A3:I3")->applyFromArray($style_header);
			
			foreach($laporan_keuangan as $data){
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $no);
				$objPHPExcel->getActiveSheet()->mergeCells('B'.$i.':D'.$i);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $data['tahun']);
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $data['waktu']." Jam");
				$objPHPExcel->getActiveSheet()->mergeCells('F'.$i.':G'.$i);
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, "Rp. ".number_format($data['pendapatan']));
				$objPHPExcel->getActiveSheet()->mergeCells('H'.$i.':I'.$i);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, "Rp. ".number_format($data['deposit']));
				$objPHPExcel->getActiveSheet()->getStyle("A".$i.":I".$i)->applyFromArray($style_item);
				$i++;
				$no++;
			}
		}

		// Set worksheet title
		$objPHPExcel->getActiveSheet()->setTitle($fileName);

		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}
	/* End Halaman Laporan Keuangan */
}
