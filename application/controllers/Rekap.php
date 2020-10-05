<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rekap_model', 'rekap_model');

		if (!$this->session->userdata('is_user_login')) {
			redirect('auth/login');
		} elseif ($this->session->userdata('is_user_login') == TRUE && $this->session->userdata('status') == 1) {
			redirect('dashboard');
		}
	}

	public function detail($id)
	{
		$data['title'] = 'kontrak';
		$data['satuan'] = get_satuan();
		$data['rekaps'] = $this->rekap_model->get_rekap($id);
		$data['id'] = $id;
		// $data['vendor'] = $this->rekap_model->get_vendor();
		$data['layout'] = 'kontrak/detail_kontrak';
		$this->load->view('layout', $data);
	}

	public function laporan($id)
	{
		$data['title'] = 'monitoring';
		$data['title2'] = 'print';
		$data['jumlah_seluruh'] = $this->rekap_model->jumlah_harga($id);
		// $progress = $this->rekap_model->progress($id);
		// var_dump($progress);
		// exit;
		$data['satuan'] = get_satuan();
		$data['rekaps'] = $this->rekap_model->get_rekap($id);
		$data['id'] = $id;
		// $data['vendor'] = $this->rekap_model->get_vendor();
		$data['layout'] = 'kontrak/laporan_kontrak';
		$this->load->view('layout', $data);
	}

		public function berkas($id)
		{
			$data['title'] = 'monitoring';
		
			$berkas = $this->rekap_model->get_berkas($id);
				// var_dump($berkas);
				// exit;
			$data['berkas'] = '';
			
			if($berkas == NULL){
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

			$data['id'] = $id;
			// $data['vendor'] = $this->rekap_model->get_vendor();
			$data['layout'] = 'kontrak/berkas_kontrak';
			$this->load->view('layout', $data);
		}

	public function add($id)
	{
		if ($this->input->post('add_rekap')) {

			$this->validation('add', $id);
		} else {
			// $this->session->set_flashdata('abort', 'rekap sudah berhasil di input!');
			redirect(base_url('rekap/detail/'. $id), 'refresh');
		}
	}

	public function edit($id, $id2)
	{
		if ($this->input->post('edit_rekap')) {

			$this->validation('edit', $id, $id2);
		} else {
			// $this->session->set_flashdata('abort', 'rekap sudah berhasil di input!');
			redirect(base_url('rekap/detail/'. $id), 'refresh');
		}
	}

	private function validation($page, $id = 0, $id2 = 0)
	{
		$this->form_validation->set_rules(
			'uraian',
			'uraian',
			'trim|required',
		
		);


		$this->form_validation->set_rules(
			'id_satuan',
			'Satuan',
			'trim|required',
		
		);

		$this->form_validation->set_rules(
			'vol',
			'volume',
			'trim|required',
		
		);

		$this->form_validation->set_rules(
			'harga',
			'Harga',
			'trim|required',
		
		);




		if ($this->form_validation->run() == FALSE) {
	
			$this->session->set_flashdata('abort', 'Input rekap gagal');
			redirect(base_url('rekap/detail/'. $id), 'refresh');
			
		} else {
			$data = array(
				'uraian' => $this->security->xss_clean($this->input->post('uraian')),
				'id_satuan' => $this->security->xss_clean($this->input->post('id_satuan')),
				'id_kontrak' => $id,
				'vol' => $this->security->xss_clean($this->input->post('vol')),
				'harga' => $this->security->xss_clean($this->input->post('harga')),
				'created_at' => date('Y-m-d  h:m:s')

			);

			$result = $this->rekap_model->insert_data($data, $id2);

			if ($result) {
				$this->session->set_flashdata('message', 'rekap sudah berhasil di input!');
				redirect(base_url('rekap/detail/'. $id), 'refresh');
			} else {
				$this->session->set_flashdata('abort', 'rekap gagal di input!');
				redirect(base_url('rekap/detail/'. $id), 'refresh');
			}
		}
	}

	public function delete($id = 0)
	{
		$this->rekap_model->delete_rekap($id);

		$this->session->set_flashdata('message', 'rekap berhasil dihapus!');
		redirect(base_url('rekap'));
	}
}
