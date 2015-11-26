<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Medicine_model extends CI_model {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	function get_tradeName() {
		//$this -> db -> select('id, group');
		$this -> db -> from('weed_resistance');
		$this -> db -> join('weed_name', 'weed_name.id = weed_resistance.weed_id');
		$this -> db -> group_by('trade_name');
		$query = $this -> db -> get();
		foreach ($query->result_array() as $row) {
			$trade_name[] = $row;
		}
		return $trade_name;
	}

}
