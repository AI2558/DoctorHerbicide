<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Store_model extends CI_model {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	function get_location() {
		$this -> db -> from('store');
		$query = $this -> db -> get();
		foreach ($query->result_array() as $row) {
			$location[] = $row;
		}
		return $location;
	}
}
