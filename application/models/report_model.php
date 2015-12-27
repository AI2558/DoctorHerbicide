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
}
