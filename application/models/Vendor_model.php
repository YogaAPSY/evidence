<?php defined('BASEPATH') or exit('No direct script access allowed');

class Vendor_model extends CI_Model
{

	// registraion
	public function insert_data($data, $id = 0)
	{
		if ($id != 0) {
			$this->db->where('id_kontrak', $id);
			$this->db->update('xx_kontrak', $data);
			return true;
		} else {
			$this->db->insert('xx_kontrak', $data);
			return true;
		}
	}

	public function get_list_kontrak($id)
	{
		$this->db->where('id_vendor', $id);
		$query = $this->db->get('xx_kontrak');

		return $query->result_array();
	}

	public function jumlah_harga($id)
	{

		$this->db->select_sum('harga');
		$this->db->where('id_kontrak', $id);
		$query = $this->db->get('xx_rekap');
		return $query->row_array();
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

	public function delete_kontrak($id)
	{
		$this->db->where('id_kontrak', $id);
		$this->db->delete('xx_kontrak');
		return true;
	}
}
