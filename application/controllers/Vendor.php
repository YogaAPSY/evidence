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

	public function detail($id)
	{
		$data['title'] = 'vendor';

		$data['jumlah_seluruh'] = $this->vendor_model->jumlah_harga($id);

		$data['satuan'] = get_satuan();
		$data['rekaps'] = $this->vendor_model->get_rekap($id);

		$data['layout'] = 'vendor/detail_kontrak';
		$this->load->view('layout', $data);
	}

	public function berkas()
	{
		$data['title'] = 'vendor';

		// $data['jumlah_seluruh'] = $this->vendor_model->jumlah_harga($id);

		// $data['satuan'] = get_satuan();
		// $data['rekaps'] = $this->vendor_model->get_rekap($id);

		$data['layout'] = 'vendor/berkas_kontrak';
		$this->load->view('layout', $data);
	}
}
