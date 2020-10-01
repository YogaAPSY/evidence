<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kontrak_model', 'kontrak_model');

		if (!$this->session->userdata('is_user_login')) {
			redirect('auth/login');
		} elseif ($this->session->userdata('is_user_login') == TRUE && $this->session->userdata('status') == 1) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$data['title'] = 'kontrak';
		$data['kontraks'] = get_nama_kontrak();
		$data['vendor'] = $this->kontrak_model->get_vendor();
		$data['layout'] = 'kontrak/list_kontrak';
		$this->load->view('layout', $data);
	}

	public function monitoring()
	{
		$data['title'] = 'monitoring';
		$data['kontraks'] = get_nama_kontrak();
		$data['vendor'] = $this->kontrak_model->get_vendor();
		$data['layout'] = 'kontrak/monitoring_kontrak';
		$this->load->view('layout', $data);
	}

	public function add()
	{
		if ($this->input->post('add_kontrak')) {

			$this->validation('add');
		} else {
			// $this->session->set_flashdata('abort', 'kontrak sudah berhasil di input!');
			redirect(base_url('kontrak'), 'refresh');
		}
	}

	public function edit($id)
	{
		if ($this->input->post('edit_kontrak')) {

			$this->validation('edit', $id);
		} else {
			// $this->session->set_flashdata('abort', 'kontrak sudah berhasil di input!');
			redirect(base_url('kontrak'), 'refresh');
		}
	}

	private function validation($page, $id = 0)
	{
		$this->form_validation->set_rules(
			'nomor_kontrak',
			'nomor_kontrak',
			'trim|required',
		
		);


		$this->form_validation->set_rules(
			'judul_kontrak',
			'Judul kontrak',
			'trim|required',
		
		);

		$this->form_validation->set_rules(
			'id_vendor',
			'Vendor',
			'trim|required',
		
		);

		$this->form_validation->set_rules(
			'mulai_kontrak',
			'Mulai Kontrak',
			'trim|required',
		
		);


		$this->form_validation->set_rules(
			'selesai_kontrak',
			'Selesai Kontrak',
			'trim|required',
		
		);



		if ($this->form_validation->run() == FALSE) {
	
			$this->session->set_flashdata('abort', 'Input kontrak gagal');
			redirect(base_url('kontrak'), 'refresh');
			
		} else {
			$data = array(
				'nomor_kontrak' => $this->security->xss_clean($this->input->post('nomor_kontrak')),
				'judul_kontrak' => $this->security->xss_clean($this->input->post('judul_kontrak')),
				'id_vendor' => $this->security->xss_clean($this->input->post('id_vendor')),
				'mulai_kontrak' => $this->security->xss_clean($this->input->post('mulai_kontrak')),
				'selesai_kontrak' => $this->security->xss_clean($this->input->post('selesai_kontrak')),
				'created_at' => date('Y-m-d  h:m:s')

			);

			$result = $this->kontrak_model->insert_data($data, $id);

			if ($result) {
				$this->session->set_flashdata('message', 'kontrak sudah berhasil di input!');
				redirect(base_url('kontrak'), 'refresh');
			} else {
				$this->session->set_flashdata('abort', 'kontrak gagal di input!');
				redirect(base_url('kontrak'), 'refresh');
			}
		}
	}

	public function delete($id = 0)
	{
		$this->kontrak_model->delete_kontrak($id);

		$this->session->set_flashdata('message', 'kontrak berhasil dihapus!');
		redirect(base_url('kontrak'));
	}
}
