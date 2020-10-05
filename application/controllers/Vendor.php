<?php defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('vendor_model', 'vendor_model');

		if (!$this->session->userdata('is_user_login')) {
			redirect('auth/login');
		} elseif ($this->session->userdata('is_user_login') == TRUE && $this->session->userdata('status') != 1) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$data['title'] = 'vendor';
		$id = $this->session->userdata('id_user');

		$data['vendors'] = $this->vendor_model->get_list_kontrak($id);
	
		// $data['vendor'] = $this->vendor_model->get_vendor();
		$data['layout'] = 'vendor/list_kontrak';
		$this->load->view('layout', $data);
	}

	public function add($id, $id_kontrak)
	{
		if($this->input->post('tambah')){

			$data = array(
				'realisasi' => $this->input->post('realisasi'),
			);

			$realisasi = $this->vendor_model->update_realisasi($id, $data);

			if($realisasi)
			{
				$this->session->set_flashdata('message', 'Update data realisasi berhasil');

				redirect(base_url('vendor/detail/'. $id_kontrak));

			}else{
				$this->session->set_flashdata('abort', 'Update data realisasi gagal');

				redirect(base_url('vendor/detail/'. $id_kontrak));
			}
		}else{
				$this->session->set_flashdata('abort', 'Update data realisasi gagal 2');

				redirect(base_url('vendor/detail/'. $id_kontrak));
		}



	}

	public function detail($id)
	{
		$data['title'] = 'vendor';

		$data['jumlah_seluruh'] = $this->vendor_model->jumlah_harga($id);

		$data['satuan'] = get_satuan();
		$data['rekaps'] = $this->vendor_model->get_rekap($id);

		$data['layout'] = 'vendor/detail_kontrak';
		$this->load->view('layout', $data);
	}

	public function berkas($id)
	{
		$data['title'] = 'vendor';

		// $data['jumlah_seluruh'] = $this->vendor_model->jumlah_harga($id);

		// $data['satuan'] = get_satuan();
		$berkas = $this->vendor_model->get_berkas($id);
		$data['berkas'] = '';
		if(empty($berkas)){
				$data['berkas'] = [
				'id_kontrak' => '',
				'file1' => '',
				'file2' => '',
				'file3' => '',
				'file4' => '',
				'file5' => '',
				'file6' => '',
				'created_at' => '00:00:00 00:00'

				];
		}else{
			$data['berkas'] = $berkas;
		}
	
		$data['id_kontrak'] = $id;
		$data['layout'] = 'vendor/berkas_kontrak';
		$this->load->view('layout', $data);
	}

	public function upload($id)
	{

		if (isset($_FILES) && !empty($_FILES)) {
				
			if ($this->security->xss_clean($_FILES, TRUE) === FALSE) {
			// file failed the XSS test

			$this->session->set_flashdata('abort', 'Upload error xss');

			redirect(base_url('vendor/berkas/'. $id));
			} else {
		
				if($this->input->post('add_berkas')){
				
					if($_FILES['file1']){
					
						$upload = $this->uploadPDF('./assets/upload/berkas/1/', $_FILES['file1'], $id,'file1');

						if($upload){
							$this->session->set_flashdata('message', 'Upload file berhasil');

							redirect(base_url('vendor/berkas/'. $id));
						}else{
							$this->session->set_flashdata('abort', 'Upload file gagal');

							redirect(base_url('vendor/berkas/'. $id));
						}
										
					}elseif($_FILES['file2']){
						$upload = $this->uploadPDF('./assets/upload/berkas/2/', $_FILES['file2'], $id,'file2');
						if($upload){
						$this->session->set_flashdata('message', 'Upload file berhasil');

						redirect(base_url('vendor/berkas/'. $id));
						}else{
						$this->session->set_flashdata('abort', 'Upload file gagal');

						redirect(base_url('vendor/berkas/'. $id));
						}
					}elseif($_FILES['file3']){
						$upload = $this->uploadPDF('./assets/upload/berkas/3/', $_FILES['file3'], $id, 'file3');
						if($upload){
						$this->session->set_flashdata('message', 'Upload file berhasil');

						redirect(base_url('vendor/berkas/'. $id));
						}else{
						$this->session->set_flashdata('abort', 'Upload file gagal');

						redirect(base_url('vendor/berkas/'. $id));
						}
					}elseif($_FILES['file4']){
						$upload = $this->uploadPDF('./assets/upload/berkas/4/', $_FILES['file4'], $id, 'file4');
						if($upload){
						$this->session->set_flashdata('message', 'Upload file berhasil');

						redirect(base_url('vendor/berkas/'. $id));
						}else{
						$this->session->set_flashdata('abort', 'Upload file gagal');

						redirect(base_url('vendor/berkas/'. $id));
						}
					}elseif($_FILES['file5']){
						$upload = $this->uploadPDF('./assets/upload/berkas/5/', $_FILES['file5'], $id, 'file5');
						if($upload){
						$this->session->set_flashdata('message', 'Upload file berhasil');

						redirect(base_url('vendor/berkas/'. $id));
						}else{
						$this->session->set_flashdata('abort', 'Upload file gagal');

						redirect(base_url('vendor/berkas/'. $id));
						}
					}elseif($_FILES['file6']){
						$upload = $this->uploadPDF('./assets/upload/berkas/6/', $_FILES['file6'], $id, 'file6');
						if($upload){
						$this->session->set_flashdata('message', 'Upload file berhasil');

						redirect(base_url('vendor/berkas/'. $id));
						}else{
						$this->session->set_flashdata('abort', 'Upload file gagal');

						redirect(base_url('vendor/berkas/'. $id));
						}
					}
				}else{
					$this->session->set_flashdata('abort', 'Tidak ada file');

					redirect(base_url('vendor/berkas/'. $id));
				}
		
			
			}
		}else{
				$this->session->set_flashdata('abort', 'Tidak ada file');

				redirect(base_url('vendor/berkas/'. $id));
		}

	}

	private function uploadPDF($directory, $files, $id_kontrak, $jenis)
	{

		$user_id = $this->session->userdata('id_user');

		// $old_image = $data['user_info']['image'];
		if (!empty($files['name'])) {
			// $kode = get_nomor_pendaftaran($id);
			$config = array(
			'upload_path' => $directory,
			'allowed_types' => "pdf|PDF|Pdf",
			'overwrite' => TRUE,
			'max_size' => "848000" // Can be set to particular file size , here it is 0.5 MB(548 Kb)
			);

			$new_name = $user_id . "-" . $id_kontrak . "-". $jenis . str_replace("application/", ".", $files['type']);
			$config['file_name'] = $new_name;

			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload($jenis)) {

			$file_data = array('upload_data' => $this->upload->data());
			$dataImage = $file_data['upload_data']['file_name'];

			if($jenis == 'file1'){
				if(check_dokumen($id_kontrak)){
					$this->db->where('id_kontrak', $id_kontrak);
					$this->db->update('xx_dokumen', ['file1' => $dataImage]);
					return true;
				}else{
					$data = array(
						'id_kontrak' => $id_kontrak,
						'file1' => $dataImage,
						'created_at' => date('Y-m-d h:m:s'),
					);

					$this->db->insert('xx_dokumen', $data);
					return true;
				}
				
			}elseif($jenis == 'file2'){
					if(check_dokumen($id_kontrak)){
						$this->db->where('id_kontrak', $id_kontrak);
						$this->db->update('xx_dokumen', ['file2' => $dataImage]);
						return true;
					}else{
						$data = array(
						'id_kontrak' => $id_kontrak,
						'file2' => $dataImage,
						'created_at' => date('Y-m-d h:m:s'),
						);

						$this->db->insert('xx_dokumen', $data);
						return true;
					}
			}elseif($jenis == 'file3'){
					if(check_dokumen($id_kontrak)){
						$this->db->where('id_kontrak', $id_kontrak);
						$this->db->update('xx_dokumen', ['file3' => $dataImage]);
						return true;
					}else{
						$data = array(
						'id_kontrak' => $id_kontrak,
						'file3' => $dataImage,
						'created_at' => date('Y-m-d h:m:s'),
						);

					$this->db->insert('xx_dokumen', $data);
					return true;
					}
			}elseif($jenis == 'file4'){
				if(check_dokumen($id_kontrak)){
					$this->db->where('id_kontrak', $id_kontrak);
					$this->db->update('xx_dokumen', ['file4' => $dataImage]);
					return true;
				}else{
					$data = array(
					'id_kontrak' => $id_kontrak,
					'file4' => $dataImage,
					'created_at' => date('Y-m-d h:m:s'),
					);

					$this->db->insert('xx_dokumen', $data);
					return true;
				}
			}elseif($jenis == 'file5'){
				if(check_dokumen($id_kontrak)){
					$this->db->where('id_kontrak', $id_kontrak);
					$this->db->update('xx_dokumen', ['file5' => $dataImage]);
					return true;
				}else{
					$data = array(
					'id_kontrak' => $id_kontrak,
					'file5' => $dataImage,
					'created_at' => date('Y-m-d h:m:s'),
					);

					$this->db->insert('xx_dokumen', $data);
					return true;
				}
			}elseif($jenis == 'file6'){
				if(check_dokumen($id_kontrak)){
					$this->db->where('id_kontrak', $id_kontrak);
					$this->db->update('xx_dokumen', ['file6' => $dataImage]);
					return true;
				}else{
					$data = array(
					'id_kontrak' => $id_kontrak,
					'file6' => $dataImage,
					'created_at' => date('Y-m-d h:m:s'),
					);

					$this->db->insert('xx_dokumen', $data);
					return true;
				}
			}else{
					$this->session->set_flashdata('abort', 'Nakal kamu yah');

					redirect(base_url('vendor/berkas/'. $id));
			}
			
		} else {
			$data['file_error'] = array('error' => $this->upload->display_errors());

			var_dump($data['file_error']);
			exit();
			$this->session->set_flashdata('abort', 'Tidak ada file');

			redirect(base_url('vendor/berkas/'. $id));
			}
		}
		// end upload user image code
	}
}
