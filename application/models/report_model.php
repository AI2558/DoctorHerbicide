<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Report_model extends CI_model {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	function get_farmer($id) {
		$this -> db -> from('farmer');
		$this -> db -> where('citizen_id', $id);
		$query = $this -> db -> get();
		foreach ($query->result_array() as $row) {
			$farmer[] = $row;
		}
		return $farmer;
	}

	function get_weed() {
		$this -> db -> select('weed_id, CommonName');
		$this -> db -> from('t_weed');
		$query = $this -> db -> get();
		foreach ($query->result_array() as $row) {
			$weed[] = $row;
		}
		return $weed;
	}

	function insert_report($id, $weed_name, $province) {
		$data = array(
   		'citizen_id' => $id,
   		'province' => $province,
   		'weed_name' => $weed_name,
   		'count' => 1
		);

		$this->db->insert('report', $data); 
	}

	function delete_report($id) {
		$this->db->where('citizen_id', $id);
		$this->db->delete('report'); 
	}

	function get_table() {
		$this -> db -> select('citizen_id, province, weed_name');
		$this -> db -> select_sum('count');
		$this -> db -> from('report');
		$this -> db -> group_by('province, weed_name');
		$query = $this -> db -> get();
		foreach ($query->result_array() as $row) {
			$table[] = $row;
		}
		return $table;
	} 

	function get_province($id) {
		$this -> db -> from('farmer');
		$this -> db -> where('citizen_id', $id);
		$query = $this -> db -> get();
		foreach ($query->result_array() as $row) {
			$farmer[] = $row;
		}
		return $farmer[0]['province'];
	}
}
