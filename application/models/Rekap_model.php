<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_model extends CI_Model
{

	// registraion
	public function insert_data($data, $id = 0)
	{
		if ($id != 0) {
			$this->db->where('id_rekap', $id);
			$this->db->update('xx_rekap', $data);
			return true;
		} else {
			$this->db->insert('xx_rekap', $data);
			return true;
		}
	}

	public function get_rekap($id)
	{

		$this->db->select('*');
		$this->db->from('xx_rekap');
		$this->db->order_by('created_at', 'desc');
		$this->db->where('id_kontrak', $id);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function jumlah_harga($id)
	{

		$this->db->select_sum('harga');
		$this->db->where('id_kontrak', $id);
		$query = $this->db->get('xx_rekap');
		return $query->row_array();
	}

	public function progress($id)
	{

		$this->db->select('(realisasi/vol * 100) as progress');
		$this->db->where('id_kontrak', $id);
		$query = $this->db->get('xx_rekap');
		return $query->row_array();
	}

	public function get_vendor()
	{

		$this->db->select('*');
		$this->db->from('xx_users');
		$this->db->order_by('created_at', 'desc');
		$this->db->where('status', 1);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function delete_rekap($id)
	{
		$this->db->where('id_rekap', $id);
		$this->db->delete('xx_rekap');
		return true;
	}
}
