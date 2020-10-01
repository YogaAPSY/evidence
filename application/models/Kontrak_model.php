<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak_model extends CI_Model
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

	public function get_vendor()
	{

		$this->db->select('*');
		$this->db->from('xx_users');
		$this->db->order_by('created_at', 'desc');
		$this->db->where('status', 1);
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
