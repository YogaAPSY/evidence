<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model', 'dashboard_model');

		if (!$this->session->userdata('is_user_login')) {
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['title'] = 'dashboard';
		$data['total_user'] = $this->dashboard_model->total('xx_users');
		$data['total_kontrak'] = $this->dashboard_model->total('xx_kontrak');
		$data['total_dokumen'] = 6;
		$data['total_rekap'] = $this->dashboard_model->total('xx_rekap');
		// $data['total_keluar'] = $this->home_model->pemasukan('xx_pendaftaran');
		// $data['total_masuk'] = $this->home_model->pemasukan('xx_admin');
		$data['layout'] = 'dashboard';
		$this->load->view('layout', $data);
	}
}
