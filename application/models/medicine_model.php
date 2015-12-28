<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Medicine_model extends CI_model {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	function get_tradeName() {
		$this -> db -> from('medicine');
		$query = $this -> db -> get();
		foreach ($query->result_array() as $row) {
			$trade_name[] = $row;
		}
		return $trade_name;
	}
	
	function get_information($med_name) {
		$this -> db -> from('medicine');
		$this -> db -> where('name', $med_name);
		$query = $this -> db -> get();
		$information = null;
		foreach ($query->result_array() as $row) {
			$information[] = $row;
		}
		return $information;
	}
}
