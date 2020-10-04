<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function get_kontrak_by_id($id)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_kontrak', array('id_kontrak' => $id))->row_array();
}

function get_nama_vendor_by_id($id)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_users', array('id_user' => $id))->row_array()['nama'];
}

function get_user_by_id($id)
{
$CI = &get_instance();
return $CI->db->get_where('xx_users', array('id_user' => $id))->row_array();
}



function get_satuan_by_id($id)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_satuan', array('id_satuan' => $id))->row_array();
}


function get_judul_kontrak_by_id($id)
{
	$CI = &get_instance();
	return $CI->db->get_where('xx_kontrak', array('id_kontrak' => $id))->row_array()['judul_kontrak'];
}

function get_nama_kontrak()
{
	$CI = &get_instance();
	return $CI->db->get('xx_kontrak')->result_array();
}

// function get_list_kontrak_by_id($id)
// {
// $CI = &get_instance();
// return $CI->db->get('xx_kontrak', array('id_vendor', $id))->result_array();
// }

function get_satuan()
{
	$CI = &get_instance();
	return $CI->db->get('xx_satuan')->result_array();
}

function check_rekap($id)
{
		$CI = &get_instance();
		return $CI->db->get_where('xx_rekap', array('id_kontrak' => $id))->num_rows();
}

function check_dokumen($id)
{
		$CI = &get_instance();
		return $CI->db->get_where('xx_dokumen', array('id_kontrak' => $id))->num_rows();
}

function get_progress($id)
{
	$CI = &get_instance();
	$CI->db->select('CASE WHEN SUM(realisasi) IS NOT NULL THEN SUM(((realisasi/vol) * 100)) ELSE 0 END as progress');
	$CI->db->where('id_kontrak', $id);
	$query = $CI->db->get('xx_rekap');
	return $query->row_array()['progress'];
}

function get_satuan_nama_by_id($id)
{	
	$CI = &get_instance();
	return $CI->db->get_where('xx_satuan', array('id_satuan' => $id))->row_array()['nama_satuan'];
}


function get_user()
{
	$CI = &get_instance();
	return $CI->db->get('xx_users')->result_array();
}
